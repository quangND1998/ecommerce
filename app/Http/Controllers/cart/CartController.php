<?php

namespace App\Http\Controllers\cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Modules\ProductCategory\Entities\Product;
// use Darryldecode\Cart\Cart;
use Cart;
use Modules\Order\Entities\ShippingFee;
use App\Models\Sale;
class CartController extends Controller
{
    //
    public function addToCart(Request $request){
        $product = Product::findOrFail($request->product_id);
        $this->addProduct($product,$request);

        return back();
    }
    public function buynow(Request $request){
        $product = Product::findOrFail($request->product_id);
        $this->addProduct($product,$request);

        return Cart::getContent();
    }
    public function addProduct($product,$request){
        if($product->checkSale()){
            $sale_event = Sale::with('sale_items')->where('state', 'running')->first();
            $sale_item = $product->sale_items()->where('product_id',$product->id)->first();

            // return $sale_item;
            $saleCondition = new \Darryldecode\Cart\CartCondition(array(
                'name' => $sale_event->name,
                'type' => $sale_event->type,
                'value' => -$sale_event->discount . $sale_event->unit,
            ));
            Cart::add(array(
                'id' => $product->id, // inique row ID
                'name' => $product->name,
                'price' => $product->cost,
                'quantity' => $request->quantity_cart,
                'attributes' => array([
                    'image' => $product->first_image->image
                ]),
                'conditions' => $saleCondition
            ));
        }else{
            Cart::add(array(
                'id' => $product->id, // inique row ID
                'name' => $product->name,
                'price' => $product->cost,
                'quantity' => $request->quantity_cart,
                'attributes' => array([
                    'image' => $product->first_image->image
                ]),
                // 'conditions' => $saleCondition
            ));
        }
        // $fee_list = ShippingFee::all();
        // dd($fee_list);
        // $total = Cart::getSubTotalWithoutConditions();


        // Cart::condition($saleCondition);

    }
    public function cartDetail(){
        return (Cart::getContent());
    }
    public function clearCart(){
        Cart::clear();
    }
    public function  updateCart(Request $request){
        // return $request;
        Cart::update($request->product_id, array(
            'quantity' => $request->quantity_cart, // so if the current product has a quantity of 4, another 2 will be added so this will result to 6
        ));
        return Cart::getSubTotal();
    }
    public function removeItem(Request $request){
        // return (Cart::getContent());
        // return $request;
        Cart::remove($request->product_id);
        return Cart::getSubTotal();
    }
}

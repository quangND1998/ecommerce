<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\ProductCategory\Entities\Attribute;
use Modules\ProductCategory\Entities\AttributeValue;
use Modules\ProductCategory\Entities\Product;
use Modules\ProductCategory\Entities\CategoryProduct;
use Modules\Order\Entities\CustomerOrder;
use Modules\Order\Entities\OrderItem;
use Modules\Order\Entities\Order;
use  App\Http\Requests\OrderRequest;
use Modules\BlogPage\Entities\Home;
use Modules\BlogPage\Entities\Post;
use App\Models\Sale;
use App\Models\SaleItem;
use Illuminate\Support\Carbon;
use Modules\Order\Entities\PaymentMethod;
use Cart;
use Modules\Order\Entities\ShippingFee;

class ProductController extends Controller
{
    //
    public function index()
    {
        $categories = CategoryProduct::with('products.first_image', 'subproducts.first_image', 'attributes.values')->where('parent_id', null)->get();
        $carton = $categories[0]->where('slug', 'hop-carton')->first();
        $carton_attr = $carton->attributes->where('idNo', '<', 4)->where('idNo', '!=', null);
        $home_setting = Home::get();
        $posts = Post::get()->take(3);
        $now = Carbon::now();
        $sale_event = Sale::with('sale_items.product.first_image')->where('state','running')->where('end_date', '>=', Carbon::now())->first();
        $best_seller = Product::orderBy('quantity_sold','desc')->orderBy('quantity_sold_auto','desc')->get()->take(12);
        // return $best_seller;

        return view('landingpage.index', compact('categories', 'carton_attr','home_setting','posts','sale_event','best_seller'));
    }
    public function product($name)
    {
        $attributes_parent = CategoryProduct::where('slug', $name)->first();
        if ($attributes_parent) {
            $list_cate_id = CategoryProduct::where('parent_id',$attributes_parent->id)->orwhere('id',$attributes_parent->id)->pluck('id');
            $attributes = Attribute::with('values')->where('category_product_id', $attributes_parent->id)->orderBy('idNo', 'asc')->get();
            $products = Product::whereIn('category_id',$list_cate_id)->paginate(5);
            return view('landingpage.product', compact('attributes','products'));
        }
        return view('landingpage.product');
    }
    public function product_detail($name)
    {
        $product = Product::with('sale_items.sale','values.attribute', 'attributes', 'images')->where('slug', $name)->first();
        if($product->checkSale()){
            $sale_event = Sale::with('sale_items')->where('state', 'running')->first();
            $sale_item = $product->sale_items()->where('product_id',$product->id)->first();
        }else{
            $sale_event = null;
            $sale_item = null;
        }
        // return $sale_item;
        $payment_method = PaymentMethod::where('active',1)->get();
        $best_seller = Product::orderBy('quantity_sold','desc')->orderBy('quantity_sold_auto','desc')->get()->take(12);
        return view('landingpage.product_detail', compact('product','payment_method','sale_event','sale_item','best_seller'));
    }
    public function checkout(){
        $payment_method = PaymentMethod::with('payment_info')->where('active',1)->get();
        $total = Cart::getSubTotalWithoutConditions();
        $shipping_fee = ShippingFee::where('start_price','<=', $total)->where('end_price','>=', $total)->first();
        //  return $shipping_fee;
        return view('landingpage.checkout',compact('payment_method','shipping_fee'));
    }
    public function saveCheckout(Request $request){
        $customer = CustomerOrder::where('phone_number',$request->phone_number)->first();
        if(!$customer){
            $customer = new CustomerOrder([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'city' => $request->city,
            'country' =>  $request->country,
            'wards'=> $request->ward,
            'address' => $request->address,
            ]);
            $customer->save();

        }
        //  dd(Cart::getSubTotal() + (int)$request->shipping_fee);
        $order = new Order([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'city' => $request->city,
            'country' =>  $request->country,
            'wards'=> $request->ward,
            'address' => $request->address,
            'notes' =>  $request->note,
            'payment_method' => $request->payment_method,
            'customer_id'  =>$customer->id,
            'status' => 'pending',
            'order_number' => 'ORD-'. strtoupper(uniqid()),
            'grand_total' => Cart::getSubTotal(),
            'shipping_fee' => (int)$request->shipping_fee,
            'last_price  ' => Cart::getSubTotal() + (int)$request->shipping_fee,
            'item_count' => Cart::getTotalQuantity(),

        ]);
        $order->save();
        foreach(Cart::getContent() as $item){
            $order->orderItems()->saveMany([
                new OrderItem(['order_id' =>  $order->id,
                    'product_id' => $item->id ,
                    'quantity' => $item->quantity,
                    'price' => $item->price,
                    'total_price' => $item->getPriceSum(),
                ])
            ]);
        }
        Cart::clear();
        return view('landingpage.successfully', compact('order'));

    }
    public function orderfinal(){

        return view('landingpage.successfully');
    }
}

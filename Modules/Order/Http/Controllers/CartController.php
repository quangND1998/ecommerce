<?php

namespace Modules\Order\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
    
        return view('order::index');
    }

    public function addToCart(Request $request)
    {
        Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
          
        ]);
        session()->flash('success', 'Product is Added to Cart Successfully !');

        return redirect()->route('cart.list');
    }

    public function updateCart(Request $request)
    {
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        session()->flash('success', 'Item Cart is Updated Successfully !');

        return redirect()->route('cart.list');
    }


    public function removeItem($id)
    {
        Cart::remove($id);
        Cart::clearCartConditions();
        if (Cart::isEmpty()) {
            return redirect('/');
        }
        return redirect()->back()->with('message', 'Item removed from cart successfully.');
    }
}

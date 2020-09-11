<?php

namespace App\Http\Controllers;
use App\Product;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Product $product){

        // add the product to cart
        \Cart::session(auth()->id())->add(array(
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => array(),
            'associatedModel' => $product
        ));
        return back();
    }

    public function index()
    {
        $cartItems = \Cart::session(auth()->id())->getContent();
        return view('cart.index', compact('cartItems'));
        
    }

    public function destroy($itemId)
    {
        \Cart::session(auth()->id())->remove($itemId);
        return back();
    }


    public function update($rowId)
    {
        \Cart::session(auth()->id())->update($rowId, [

            'quantity' => [
                'relative'=>false,
                'value' => request('quantity')
            ]
        ]);
        return back();
    }

    public function checkout()
    {
        return view('cart.checkout'); 
    }

}

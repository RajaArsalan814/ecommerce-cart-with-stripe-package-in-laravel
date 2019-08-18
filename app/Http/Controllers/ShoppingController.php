<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use Session;
use App\Product;
class ShoppingController extends Controller
{
    public function add_to_cart(){
        
// dd(request()->all());    
        $product=Product::find(request()->pd_id);
        // $cart=        Cart::add('293ad', 'Product 1', 1, 9.99, 550);

        $cartItem=Cart::add([

            'id'=>$product->id,
            'name'=>$product->name,
            'qty'=>request()->cart_to_add,
            'price'=>$product->price,
            'weight'=>$product->price,

        ]);

        Cart::associate($cartItem->rowId,'App\Product');

        return redirect()->route('cart');

    }

    public function cart(){

        return view('cart');
    }

    public function cart_remove($id){

        Cart::remove($id);
        Session::flash('success','Product has Removed in the cart');
        return redirect()->back();
    }

    public function inc($id,$qty){

        Cart::update($id,$qty+1);


      
        return redirect()->back();
    }

    public function dec($id,$qty){

        Cart::update($id,$qty-1);
        return redirect()->back();
    }
    
    public function cart_single($id){

        $product=Product::find($id);

        $cartItem=Cart::add([

            'id'=>$product->id,
            'name'=>$product->name,
            'qty'=>'1',
            'price'=>$product->price,
            'weight'=>$product->price,

        ]);

        Cart::associate($cartItem->rowId,'App\Product');

        Session::flash('success','Product has added in the cart');

        return redirect()->route('cart');

    }
}

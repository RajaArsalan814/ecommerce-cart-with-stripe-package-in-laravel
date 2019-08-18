<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use Cart;
use Session;
use Mail;

class CheckOutController extends Controller
{
    public function index(){
        if(Cart::content()->count()==0)
        {
            Session::flash('info','You have to add some product');
            return redirect()->back();
        }
        return view('checkout');
    }

    public function pay(){

        Stripe::setApiKey('sk_test_kTfmncs6Swkk5CSi43fnmvpq00a1ks7izJ');
        
        $charge=Charge::create([
            'amount'    =>  ceil(Cart::subtotal()) * 100,
            'currency'  =>  'usd',
            'description'   =>  'Udemy Payment',
            'source'        =>  request()->stripeToken
        ]);

            Session::flash('success','Purchased,Wait for our email');
            
            Cart::destroy();

            Mail::to(request()->stripeEmail)->send(new \App\Mail\PurchasedEmail);

            return redirect('/');
    }
}

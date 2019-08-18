<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class FrontEndController extends Controller
{
 
    public function index(){
        $products=Product::paginate(3);
        return view('frontend',compact('products',$products));
    }
    public function single_product($id){
        return view('single',['product'=>Product::find($id)]);
    }
}

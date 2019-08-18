<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index(){
        $products=Product::all();
        return view('products.products')->with('products',$products);
    }

    public function create(){
        $edit=false;
        return view('products.create')->with('edit',$edit);
    }

    public function store(Request $request){
        $product    =   new Product;
        $product->name=$request->name;
        $product->price=$request->price;
        $product->image=$request->image;
        $product->save();
        return redirect()->route('products');
    }

    public function edit($id){
        $edit=true;
        $product        =     Product::find($id);
        return view('products.create')->with('edit',$edit)->with('product',$product);
    }

    public function update(Request $request,$id){
        $product        =     Product::find($id);
        $product->name  =     $request->name;
        $product->price =     $request->price;
        $product->image =     $request->image;
        $product->save();
        return redirect()->route('products');
    }

    public function delete($id){
        $product        =     Product::find($id);
        $product->delete();
        return redirect()->route('products');
    }
}

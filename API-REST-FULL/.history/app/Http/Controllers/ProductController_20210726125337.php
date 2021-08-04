<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return response()->json(compact('products'));

    }

    public function update(){

    }

    public function store(Request $request){
        $products = Product::create($request->all());
        return response()->json(compact('product'));
    }


    public function delete(Product $product){
        $product->delete();
        return response()->json(compact('product'));

    }
}

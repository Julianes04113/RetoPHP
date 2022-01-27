<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Resources\views\Products\index;

class ProductController extends Controller
{
    public function index(){

        $list = Product::all();
       return view('Products.index', compact('list'));
    }

    public function create(){
        return view('Products.create');
    }

    public function store(){
       $product = Product::create(request()->all());

        return view('Products.stored');

    } 

    public function show($product){

       $product = Product::findOrFail($product);

       return view('products.show')->with([
        'product'=> $product,   
       ]);
       //comentario en vista
    }

    public function edit($product){
        return view('products.edit')->with([
            'product'=> Product::findOrFail($product),
            ]);
    }

    public function update($product){
        //dd('Estoy en update');
        $product= Product::findOrFail($product);
        $product->update(request()->all());
        return view('products.edited');
        //comentario en vista
    }

    public function destroy($product){
        $product=Product::findOrFail($product);
        $product->delete();
        return $product;
    }
}

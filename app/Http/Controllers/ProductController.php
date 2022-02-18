<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Resources\views\Products\index;
use App\Http\Requests\Admin\StoreProductRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Image;
use Illuminate\Support\Str;


class ProductController extends Controller
{
    public function index(Request $request){
       $productSearch=trim($request->get('ProductSearchBar'));
       $searched = Product::select('id','title','description','price','stock')
            ->filter($productSearch)
            ->orderBy('id','asc')
            ->paginate(10);
       //$list = Product::Paginate(15);
       return view('Products.index', compact('productSearch','searched'));
    }

    public function create(){
        return view('Products.create');
    }

    public function store(StoreProductRequest $request){

        $product = Product::create($request->validated());

       return view('products.stored');
    } 

    public function show($product){

       $product = Product::findOrFail($product);

       return view('products.show')->with([
        'product'=> $product,   
       ]);
    }

    public function edit($product){
        return view('products.edit')->with([
            'product'=> Product::findOrFail($product),
            ]);
    }

    public function update(StoreProductRequest $product){

        $product= Product::findOrFail($product);
        $product->update(request()->all());
        return view('products.edited');

    }

    public function destroy($product){
        $product=Product::findOrFail($product);
        $product->delete();
        return view('products.deleted');
    }
}
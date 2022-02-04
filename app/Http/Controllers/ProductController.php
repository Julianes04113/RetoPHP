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


class ProductController extends Controller
{
    public function index(){
        $list = Product::Paginate(15);
       return view('Products.index', compact('list'));
    }

    public function create(){
        return view('Products.create');
    }

    public function store(StoreProductRequest $request){
        /*$product = new Product();
        $product->code = $request->input('code');
        $product->title = $request->input('title');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        $product->status = $request->input('status');
        $product->save();
        este método no funciona */
        /*
        if($request->status == 'Available' && $request->stock == 0) {
            return redirect()
                ->back()
                ->withInput($request->all())
                ->withErrors('Si está disponible, debe tener un stock mínimo de 1');
        }
        */
        //dd($request->all(), $request->validated());

        $product = Product::create($request->validated());

        /* $ProductRules=[
            'code' => ['required', 'size:10', 'alpha_num', 'starts_with:MERCA'],
            'name' => ['required', 'min:5', 'max:100'],
            'price' => ['required', 'integer', 'min:1'],
            'quantity' => ['required', 'integer', 'min:0'],
            'description' => ['required', 'min:10', 'max:500'],
            'status' => ['required'],
                      ];
        

       request()->validate($ProductRules); */
        
       //$product = Product::create(request()->all());
       //return redirect()->route('products.stored');
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
        //dd('Estoy en update');
        $product= Product::findOrFail($product);
        $product->update(request()->all());
        return view('products.edited');
        //comentario en vista
    }

    public function destroy($product){
        $product=Product::findOrFail($product);
        $product->delete();
        return view('products.deleted');
    }
}
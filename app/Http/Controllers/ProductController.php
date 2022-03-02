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
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(Request $request): View
    {
       $productSearch=trim($request->get('ProductSearchBar'));
       
       $searched = Product::select('id','title','description','price','stock','status')
            ->filter($productSearch)
            ->orderBy('id','asc')
            ->paginate(10);
    return view('products.index', compact('productSearch','searched'));
    }

    public function create(): View {

        return view('products.create');
    }

    public function store(StoreProductRequest $request): RedirectResponse
    {
        $product = Product::create($request->validated());
       /*-- $product = new Product();
        $product->title=$request->input('title');
        $product->description=$request->input('description');
        $product->price=$request->input('price');
        $product->stock=$request->input('stock');
        $product->status=$request->input('status');
        $images = Image::factory(mt_rand(2,4))->make();
        $product->images()->saveMany($images);
        $product->save(); */

        session()->flash('success', "Bien Tontolín, te quedo creado bien esta mondá");
        return redirect()->back()->with('success','Bien Tontolín, te quedo creado bien esta mondá');
    } 

    public function show($product): View
    {
       $product = Product::findOrFail($product);
        $images = Image::select('imageable_id')->where('imageable_id', 'LIKE', '$product->id');
       return view('products.show')->with(['product'=> $product]);
    }

    public function edit($product): View
    {
        return view('products.edit')->with(['product'=> Product::findOrFail($product)]);
    }

    public function update(StoreProductRequest $request, Product $product): RedirectResponse
    {
        $product->update(request()->all());
        return redirect()->back()->with('success','Bien Tontolín, te quedo editado bien esta mondá');

    }

    public function destroy($product): View
    {
        $product=Product::findOrFail($product);
        $product->delete();
        return view('products.deleted');
    }
}
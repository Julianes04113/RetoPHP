<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\Admin\StoreProductRequest;
use Illuminate\Http\RedirectResponse;
use App\Models\Image;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(Request $request): View
    {
        $productSearch = trim($request->get('ProductSearchBar'));

        $searched = Product::select('id', 'title', 'description', 'price', 'stock', 'status')
            ->filter($productSearch)
            ->orderBy('id', 'asc')
            ->paginate(10);
        return view('products.index', compact('productSearch', 'searched'));
    }

    public function create(): View
    {
        return view('products.create');
    }

    public function store(StoreProductRequest $request): RedirectResponse
    {
        $product = Product::create($request->validated());
        session()->flash('success', "Bien Tontolín, te quedo creado bien esta mondá");
        return redirect()->back()->with('success', 'Bien Tontolín, te quedo creado bien esta mondá');
    }

    public function show($product): View
    {
        $product = Product::findOrFail($product);
        $images = Image::select('imageable_id')->where('imageable_id', 'LIKE', '$product->id');
        return view('products.show')->with(['product' => $product]);
    }

    public function edit($product): View
    {
        return view('products.edit')->with(['product' => Product::findOrFail($product)]);
    }

    public function update(StoreProductRequest $request, Product $product): RedirectResponse
    {
        $product->update(request()->all());
        return redirect()->back()->with('success', 'Bien Tontolín, te quedo editado bien esta mondá');
    }

    public function destroy($product): View
    {
        $product = Product::findOrFail($product);
        $product->delete();
        return view('products.deleted');
    }
}

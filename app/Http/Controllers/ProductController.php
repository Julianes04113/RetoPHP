<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Product;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\StoreProductRequest;

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

    public function store(StoreProductRequest $request, Product $product): RedirectResponse
    {
        $product = Product::create($request->validated());

        $product->images()->create([
                'path' => $request->image->store('products', 'images'),
            ]);

        return redirect()->back()->with('success', 'Bien Tontolín, te quedo creado bien esta mondá');
    }

    public function show($product): View
    {
        $product = Product::findOrFail($product);
        $query = Product::findOrFail($product->id)->images;
        $images = $query->pluck('path')->toArray();
        return view('products.show')->with(
            ['product' => $product,
            'images' => $images]
        );
    }

    public function edit(Product $product): View
    {
        $query = Product::findOrFail($product->id)->images;
        $images = $query->pluck('path')->toArray();
        return view('products.edit')->with([
            'product' => $product,
            'images' => $images]);
    }

    public function update(StoreProductRequest $request, Product $product): RedirectResponse
    {
        $product->update($request->validated());
        return redirect()->back()->with('success', 'Bien Tontolín, te quedo editado bien esta mondá');
    }

    public function destroy($product): View
    {
        $product = Product::findOrFail($product);
        $product->delete();
        return view('products.deleted');
    }
}

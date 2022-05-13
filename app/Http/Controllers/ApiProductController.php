<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateApiProductsRequest;
use App\Http\Requests\Admin\StoreProductRequest;

class ApiProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return response()->json([
            'response' => true,
            'message' => 'Este es el listado de productos',
            'products' => $products
        ], 200);
    }

    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request->validated());

        $product->images()->create([
                'path' => $request->image->store('products', 'images'),
            ]);

        return response()->json([
            'message' => 'El producto se ha creado',
            'product' => $product
        ]);
    }

    public function show($request)
    {
        $product = Product::findOrFail($request);
        $query = Product::findOrFail($request)->images;
        $images = $query->pluck('path')->toArray();
        return response()->json([
            'message' => 'Este es el producto que busca',
            'product' => $product,
            'product_images' => $images,
        ]);
    }

    public function update(UpdateApiProductsRequest $request, Product $product)
    {
        $product->update($request->validated());
        return response()->json([
            'message' => 'El producto se ha actualizado',
            'product' => $product,
        ]);
    }

    public function destroy($request)
    {
        $product = Product::findOrFail($request);
        $product->delete();
        return response()->json([
            'message' => 'El producto se ha eliminado',
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\View\View;

class UserProductController extends Controller
{
    public function index(Request $request): View
    {
        $productSearch = trim($request->get('UProductSearchBar'));

        $searched = Product::select('id', 'title', 'description', 'price', 'stock', 'status')
            ->filter($productSearch)
            ->orderBy('id', 'asc')
            ->paginate(10);
        return view('UserProduct.index', compact('productSearch', 'searched'));
    }

    public function show($product): View
    {
        $product = Product::findOrFail($product);

        return view('products.show')
            ->with(
                ['product' => $product],
                ['success', 'Producto agregado al carrito correctamente']
            );
    }
}

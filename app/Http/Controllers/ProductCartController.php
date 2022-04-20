<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Services\cartService;
use Illuminate\Http\RedirectResponse;

class ProductCartController extends Controller
{
    public $cartService;

    public function __construct(cartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function store(Request $request, Product $product): RedirectResponse
    {
        $cart=$this->cartService->getFromCookieorCreate();

        $quantity = $cart->products()
                            ->find($product->id)
                            ->pivot
                            ->quantity ?? 0;

        $cart->products()->syncWithoutDetaching([
            $product->id => ['quantity'=> $quantity + 1 ],
        ]);

        $cookie = $this->cartService->makeCookie($cart);

        return redirect()->back()->cookie($cookie);
    }

    public function destroy(Product $product, Cart $cart): RedirectResponse
    {
        $cart->products()->detach($product->id);
        $cookie = $this->cartService->makeCookie($cart);
        return redirect()->back()->cookie($cookie);
    }
}

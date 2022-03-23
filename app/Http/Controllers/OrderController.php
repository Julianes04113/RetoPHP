<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Services\cartService;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class OrderController extends Controller
{
    public $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;

        $this->middleware('auth');
    }

    public function create()
    {
        $cart = $this->cartService->getfromCookie();

        if (!isset($cart)||$cart->products->isEmpty()) {
            return redirect()->back()->withErrors("Su carrito está vacío, weba");
        }

        return view('orders.create')->with(['cart'=>$cart]);
    }
    
    public function store(Request $request)
    {
        $user = $request->user();

        $order = $user->orders()->create([
            'status' => 'pending',
        ]);

        $cart=$this->cartService->getFromCookie();

        $cartProductsWithQuantity = $cart->products->mapWithKeys(function ($product){
            $element[$product->id] = ['quantity' => $product->pivot->quantity];
            return $element;
        });

        $order->products()->attach($cartProductsWithQuantity->toArray());

        return redirect()->route('orders.payments.create', ['order' => $order]);

    }
}

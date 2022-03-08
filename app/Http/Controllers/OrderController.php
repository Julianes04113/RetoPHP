<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Services\cartService;
use Illuminate\Support\Facades\DB;

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
        //
    }
}

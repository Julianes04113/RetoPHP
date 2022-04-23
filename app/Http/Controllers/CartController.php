<?php

namespace App\Http\Controllers;

use App\Services\cartService;
use Illuminate\Contracts\View\View;

class CartController extends Controller
{
    public $cartService;

    public function __construct(cartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function index(): View
    {
        return view('carts.index')->with([
            'cart' => $this->cartService->getFromCookie(),
        ]);
    }
}

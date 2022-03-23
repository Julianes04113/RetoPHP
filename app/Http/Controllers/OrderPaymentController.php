<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Services\cartService;

class OrderPaymentController extends Controller
{
    public $cartService;

    public function __construct(cartService $cartService){
        $this->cartService = $cartService;
        $this->middleware('auth');
    }

    public function create(Order $order)
    {
        return view('payments.create')->with([
            'order'=> $order,
        ]);
    }


    public function store(Request $request, Order $order)
    {
        //aqui se realiza el pago. Procedo a liberar carrito
        $this->cartService->getFromCookie()->products()->detach();

        $order->payment()->create([
            'amount' => $order->total,
            'payed_at' => now(),
        ]);


        $order->status = 'payed';
        $order->save();

        return redirect()->route('dashboard')->withSuccess("Gracias por pagar, es decir, por dejarse atracar por nuestro pésimo servicio");
    }

}

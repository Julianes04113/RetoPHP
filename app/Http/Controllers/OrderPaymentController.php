<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\cartService;
use App\Services\WebService;

class OrderPaymentController extends Controller
{
    public $cartService;

    public $WebService;

    public function __construct(cartService $cartService, WebService $WebService){
        $this->cartService = $cartService;
        $this->WebService = resolve(WebService::class);
        $this->middleware('auth');
    }

    public function create(Order $order)
    {
        session(['order_id' => $order->id]);
        //dd($order);
        return view('payments.create')->with([
            'order'=> $order,
        ]);
    }

    public function Webcheckout(Request $request, Order $order)
    {
    return $this->WebService->createRequest($request, $order);
    }

    public function handle(Response $response, Request $request, Order $order)
    {
        //dd($order);

        $requestId = session()->get('requestId');

        $requestedInfo = $this->WebService->getRequestInformation($requestId, $order); 

        //dd($requestId, $requestedInfo);
        //$is_payed es un objeto, no un array

        $is_payed = $requestedInfo->status->status;

        //el objeto order se pierde en la transacción, cómo recuperarlo? le he inyectado en todos los métodos
        if($is_payed="APPROVED")
            {
            //dd($order);
            $order->payment()->create([
                'amount' => $order->total,
                'payed_at' => now(),
                'requestId' => $requestId,
                'requestStatus' => $is_payed,
                'requestDate' => now(),
            ]);
            $order->status = 'payed';

            $order->save();

            session()->forget(['requestId','order_id']);

            $this->cartService->getFromCookie()->products()->detach();

                return redirect()->route('dashboard')->withSuccess('Gracias por dejarse atracar. Vuelvas prontos!');
            }
        else
            {
                return redirect()->route('dashboard')->withErrors('Algo salió mal, muy mal!');
            }

    }

    public function cancelled()
    {
        return redirect()
            ->route('dashboard')
            ->withErrors('¿Porqué cancela el pago? diga a ver pues');
    }
        
}

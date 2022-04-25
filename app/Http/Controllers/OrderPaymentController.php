<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\cartService;
use App\Services\WebService;
use Illuminate\Contracts\View\View;

class OrderPaymentController extends Controller
{
    public $cartService;

    public $WebService;

    public function __construct(cartService $cartService)
    {
        $this->cartService = $cartService;
        $this->WebService = resolve(WebService::class);
        $this->middleware('auth');
    }

    public function create(Order $order): View
    {
        return view('payments.create')->with([
            'order' => $order,
        ]);
    }

    public function webcheckout(Request $request, Order $order)
    {
        return $this->WebService->createRequest($request, $order);
    }

    public function handle(Response $response, Request $request, Order $order)
    {
        $requestedInfo = $this->WebService->getRequestInformation($order->requestId, $order);

        $is_payed = $requestedInfo->status->status;

        $order->status = $is_payed;
        $order->amount = $requestedInfo->payment->amount->total;
        $order->save();

        if ($is_payed == 'APPROVED') {
            $this->cartService->getFromCookie()->products()->detach();

            return redirect()->route('dashboard')
                ->with(
                    'success',
                    'Si se siente estafado, favor enviar correo a yaper...yaperdio@nohaydevoluciones.com'
                );
        } elseif ($is_payed == 'PENDING') {
            return redirect()->route('dashboard')->withErrors('Su "pago" quedó pendiente. Favor revisar en 5 minutos...');
        } else {
            return redirect()->route('dashboard')->withErrors('');
        }
    }

    public function cancelled()
    {
        return redirect()
            ->route('dashboard')
            ->withErrors('¿Porqué cancela el pago? diga a ver pues');
    }
}

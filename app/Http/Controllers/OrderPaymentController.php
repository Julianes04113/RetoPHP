<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\cartService;
use App\Services\WebService;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\View as FacadesView;

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
            'order'=> $order,
        ]);
    }

    public function webcheckout(Request $request, Order $order)
    {
        return $this->WebService->createRequest($request, $order);
    }

    public function handle(Response $response, Request $request, Order $order)
    {
        $requestId = session()->get('requestId');

        $requestedInfo = $this->WebService->getRequestInformation($requestId, $order);

        $is_payed = $requestedInfo->status->status;

        if ($is_payed=="APPROVED") {
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
        else {
            $order->payment()->create([
                    'amount' => $order->total,
                    'payed_at' => now(),
                    'requestId' => $requestId,
                    'requestStatus' => $is_payed,
                    'requestDate' => now(),
            ]);
            $order->status = 'payed';

                return redirect()->route('dashboard')->withErrors('Algo salió mal, muy mal!');
            }
        return redirect()
            ->route('dashboard')
            ->withErrors('¿Porqué cancela el pago? diga a ver pues');
       

    }

    public function cancelled()
    { 
    }
        
}

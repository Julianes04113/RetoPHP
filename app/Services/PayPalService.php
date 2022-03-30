<?php

namespace App\Services;
use App\Traits\ConsumesExternalServices;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PayPalService
{
	use ConsumesExternalServices;

	protected $baseUri;
	protected $clientId;
	protected $clientSecret;

	public function __construct()
	{
		$this->baseUri = config('services.paypal.base_uri');
		$this->clientId = config('services.paypal.client_id');
		$this->clientSecret = config('services.paypal.client_secret');
	}

    public function resolveAuthorization(&$queryParams, &$formParams, &$headers)
    {
        $headers['Authorization'] = $this->resolveAccessToken();
    }

    public function decodeResponse($response)
    {
        return json_decode($response);
    }

    public function resolveAccessToken()
    {
        $credentials = base64_encode("{$this->clientId}:{$this->clientSecret}");

        return "Basic {$credentials}";
    }

    public function handlePayment(Request $request)
    {
        $order = $this->createOrder($request->value, $request->currency);
        //crea una coleccion de laravel y buscamos los links
        //dd($order);
        $orderLinks = collect($order->links);
        //crea una variable con el contenido del link de aprobación
        //dd($orderLinks);
        $approve =$orderLinks->where('rel', 'approve')->first();
        
        session()->put('approvalId', $order->id);
        return redirect ($approve->href);
    }

      public function handleApproval()
    {
        if (session()->has('approvalId')) {
            $approvalId = session()->get('approvalId');

            $payment = $this->capturePayment($approvalId);

            $name = $payment->payer->name->given_name;
            $payment = $payment->purchase_units[0]->payments->captures[0]->amount;
            $amount = $payment->value;
            $currency = $payment->currency_code;

            return redirect()
                ->route('dashboard')
                ->withSuccess(['payment' => "Gracias, {$name}. Recibimos los {$amount}{$currency} que no querías"]);
        }

        return redirect()
            ->route('dashboard')
            ->withErrors('Este servicio es algo maaaalo, maaaaaaaalo');
    }


   public function createOrder($value, $currency)
    {
        return $this->makeRequest(
            'POST',
            '/v2/checkout/orders',
            [],
            [
                'intent' => 'CAPTURE',
                'purchase_units' => [
                    0 => [
                        'amount' => [
                            'currency_code' => strtoupper($currency),
                            'value' => $value,
                                    ]
                        ]
                                    ],
            ],
            [],
            $isJsonRequest = true,
        );
    }

    public function capturePayment($approvalId)
    {
        return $this->makeRequest(
            'POST',
            "/vs/checkout/orders/{$approvalId}/capture",
            [],
            [],
            [
                'Content-Type' => 'application/json'
            ],
        );
    }

}
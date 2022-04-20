<?php

namespace App\Services;

use App\Traits\ConsumesExternalServices;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\Order;

class WebService
{
    use ConsumesExternalServices;

    protected $seed;
    protected $nonce;
    protected $tranKey;
    protected $baseUri;

    public function __construct()
    {
        $seed= date('c');
        $this->seed = $seed;
        $this->nonce = bin2hex(random_bytes(16));
        $this->tranKey = base64_encode(hash('sha1', $this->nonce.$seed.config('webcheckout.tranKey'), true));
    }
    
    public function decodeResponse($response)
    {
        return json_decode($response);
    }

    public function createRequest(Request $request, Order $order)
    {
        $req = $this->makeRequest(
            'POST',
            'https://dev.placetopay.com/redirection/api/session',
            [],
            [
                'locale' => 'es_CO',
                'auth' => [
                    'login' => config('webcheckout.login'),
                    'tranKey' => $this->tranKey,
                    'nonce' => base64_encode($this->nonce),
                    'seed' => $this->seed],
                'payment' => [
                    'reference' => 'Mercatodo',
                    'description' => 'Tu carrito de robo irresponsable',
                    'amount' => [
                        'currency' => 'COP',
                        'total' => "{$request->value}"],
                    'allowPartial' => false],
                'expiration' => Carbon::now()->addDay(2)->toIso8601String(),
                'returnUrl' => route('successfullRobery', $order),
                'ipAddress' => app(Request::class)->getClientIp(),
                'userAgent' => substr(app(Request::class)->header('User-Agent'), 0, 255),
            ],
            [
              'Content-Type' => 'application/json'
            ],
            $isJsonRequest = true
        );
        
        $resp = json_decode($req);

        session(['requestId' => $resp->requestId]);

        return redirect($resp->processUrl);
    }

    public function getRequestInformation($requestId, Order $order)
    {
        $info = $this->makeRequest(
            'POST',
            "https://dev.placetopay.com/redirection/api/session/{$requestId}",
            [],
            [
                'auth' => [
                    'login' => config('webcheckout.login'),
                    'tranKey' => $this->tranKey,
                    'nonce' => base64_encode($this->nonce),
                    'seed' => $this->seed],
            ],
            [
                'Content-Type' => 'application/json'
            ],
            $isJsonRequest = true,
        );
        return json_decode($info);
    }
}

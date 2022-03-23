<?php

namespace App\Services;
use App\Traits\ConsumesExternalServices;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

class WebService
{
	use ConsumesExternalServices;

	protected $seed;
	protected $nonce;
	protected $tranKey;

	public function __construct()
	{
		$this->seed = Carbon::now();
		$this->nonce = Str::random(8);
		$this->tranKey = base64_encode(hash('sha1',$nonce.$seed.config('webcheckout.tranKey'),true));
	}

    public function resolveAuthorization(&$queryParams, &$formParams, &$headers)
    {
        $headers['Authorization'] = $this->resolveAccessToken();
    }

    public function decodeResponse($response)
    {
        return json_decode($response);
    }
    
   public function createSession()
    {
        return $this->makeRequest(
            'POST',
            'https://test.placetopay.com/redirection/api/session',
            [],
            [
                'auth' => [
                    'login' => config('webcheckout.login'),
                    'tranKey' => $tranKey,
                    'nonce' => base64_encode($nonce),
                    'seed' => $seed],
                'payment' => [
                    'reference' => 'Prueba111',
                    'description' => 'Lo peor',
                    'amount' => [
                        'currency' => 'USD',
                        'total' => '100'],
                    'allowPartial' => false]
                'expiration' = ''
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
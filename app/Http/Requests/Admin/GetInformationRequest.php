<?php

namespace App\Http\Requests\Admin;

use Illuminate\Support\Str;
use App\Contracts\WebcheckoutRequestContract;
use Carbon\Carbon;

class GetInformationRequest implements WebcheckoutRequestContract

{
	public function auth()
	{
		$seed = Carbon::now();

		$nonce = Str::random(8);

		$tranKey = base64_encode(hash('sha1',$nonce.$seed.config('webcheckout.tranKey'),true));

		return [
			'auth' => [
				'login' => config('webcheckout.login'),
				'tranKey' => $tranKey,
				'nonce' => base64_encode($nonce),
				'seed' => $seed
			]
		];
	}

	public static function url(?int $session_id): string
	{
		return config('webcheckout.url').'/api/session/'.$session_id;
	}
}
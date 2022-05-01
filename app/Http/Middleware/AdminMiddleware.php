<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        $idsToProcess = Order::select('status', 'requestId')
        ->where('status', 'LIKE', 'PENDING')
        ->get();
        dd($idsToProcess);
        
        $user = Auth::user();

        if ($user->admin_since != 'null') {
            return $next($request);
        }

        return redirect()->route('dashboard')->withErrors('No estás autorizado para entrar como Admin');
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        if ($user->disabled_at != 'null') {
            return $next($request);
        }
        return redirect()->route('dashboard')
            ->withErrors('No estás autorizado para entrar, contacte al Administrador del sitio');
    }
}

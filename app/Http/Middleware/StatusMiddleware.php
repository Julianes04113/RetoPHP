<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (auth()->user()->disabled_at <>null) {
            return $next($request);
        }
        return redirect()->route('dashboard')->with('error', 'No estás autorizado para entrar, contacte al Administrador del sitio');
    }
}

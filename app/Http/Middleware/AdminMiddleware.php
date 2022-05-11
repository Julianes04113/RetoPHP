<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        /*$a = Product::whereHasMorphed('productables', function (Builder $query) {
            $query->where('quantity', 'LIKE', 'APPROVED');
        })->count();
        dd($a);*/


        $user = Auth::user();
        if ($user->admin_since != 'null') {
            return $next($request);
        }

        return redirect()->route('dashboard')->withErrors('No estás autorizado para entrar como Admin');
    }
}

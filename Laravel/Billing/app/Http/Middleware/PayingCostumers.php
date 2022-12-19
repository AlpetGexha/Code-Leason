<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PayingCostumers
{
    public function handle($request, Closure $next)
    {
        if ($request->user() && !$request->user()->subscribed('cashier')) {
            // This user is not a paying customer...
            return to_route('subscribe.get');
        }

        return $next($request);
    }
}

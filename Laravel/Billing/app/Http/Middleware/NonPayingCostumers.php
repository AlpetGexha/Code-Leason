<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class NonPayingCostumers
{
    public function handle($request, Closure $next)
    {
        if ($request->user() && $request->user()->subscribed('cashier')) {
            // This user is a paying customer...
            // return to_route('subscribe.get');
            return to_route('members');
        }

        return $next($request);
    }
}

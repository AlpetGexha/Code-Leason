<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BanDeleteRequest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */


    # php artisan make:middleware BanDeleteRequest
    //next pasi te kryet codi ne ket middelware kalon ne middelwarin tjeter
    //cdo middelware duhet te shtohet ne Kernel.php
    public function handle(Request $request, Closure $next)
    {
        if ($request->method() == "GET") {
            abort(404);
        }
        return $next($request);
    }
}

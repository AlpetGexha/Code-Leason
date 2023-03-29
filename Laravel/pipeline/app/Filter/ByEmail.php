<?php

namespace App\Filter;

use Closure;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ByEmail
{
    public function __construct(protected Request $request)
    {
    }

    public function handle(Builder $query, Closure $next)
    {
        if ($this->request->has('email')) {
            $query->where('email', 'REGEXP', $this->request->email);
        }

        return $next($query);
    }
}

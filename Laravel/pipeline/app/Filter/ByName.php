<?php

namespace App\Filter;

use Closure;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ByName
{
    public function __construct(protected Request $request)
    {
    }

    public function handle(Builder $query, Closure $next)
    {
        if ($this->request->has('name')) {
            $query->where('name', 'REGEXP', $this->request->name);
        }

        return $next($query);
    }
}

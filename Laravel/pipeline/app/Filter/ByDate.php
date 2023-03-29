<?php

namespace App\Filter;

use Closure;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ByDate
{
    public function __construct(protected Request $request)
    {
    }

    public function handle(Builder $query, Closure $next)
    {
        if ($this->request->has('date')) {
            $query->where('created_at', 'REGEXP', $this->request->date);
        }

        return $next($query);
    }
}

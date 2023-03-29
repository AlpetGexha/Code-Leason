<?php

namespace App\Filter;

use Closure;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class SortBy
{
    public function __construct(protected Request $request)
    {
    }

    public function handle(Builder $query, Closure $next)
    {
        if ($this->request->hasAny(['sort', 'sortBy'])) {
            $sort = $this->request->sort ?? 'asc';
            $sortBy = $this->request->sortBy ?? 'created_at';

            $query->orderBy($sortBy, $sort);
        }

        return $next($query);
    }
}

<?php

namespace App\Employee;

use Closure;
use Illuminate\Database\Eloquent\Collection;

class SortEmployeesByTotalHoursWorked
{
    // Sort the collection in descending order based on the total number of hours worked.

    public function handle(Collection $employees, Closure $next)
    {
        $employees = $employees->sortByDesc('total_hours');

        return $next($employees);
    }
}

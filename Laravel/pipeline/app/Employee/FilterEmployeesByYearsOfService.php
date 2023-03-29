<?php

namespace App\Employee;

use Closure;
use Illuminate\Database\Eloquent\Collection;

class FilterEmployeesByYearsOfService
{
    // Filter the collection to only include employees who have worked for the company for more than 5 years.

    public function __construct(public int $yearsOfService = 5)
    {
    }

    public function handle(Collection $employees, Closure $next)
    {
        $employees = $employees->filter(function ($employee) {
            $hire_date = $employee->hire_date;
            $years_of_service = now()->diffInYears($hire_date);

            return $years_of_service > $this->yearsOfService;
        });

        return $next($employees);
    }
}

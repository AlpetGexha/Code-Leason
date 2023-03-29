<?php

namespace App\Employee;

use Closure;
use Illuminate\Database\Eloquent\Collection;

class CalculateTotalHoursWorked
{
    // Calculate the total number of hours worked by each employee.

    public function handle(Collection $employees, Closure $next)
    {
        // Calculate total hours worked by each employee

        $employees->map(function ($employee) {
            $total_hours = $employee->time_logs->sum('hours_worked');

            return [
                'id' => $employee->id,
                'name' => $employee->name,
                'total_hours' => $total_hours,
            ];
        });

        return $next($employees);
    }
}

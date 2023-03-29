<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline as PipelinePipeline;
use Illuminate\Support\Facades\Pipeline;

class EmployeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $pipelines = [
            // new \App\Employee\FilterEmployeesByYearsOfService(2),
            \App\Employee\FilterEmployeesByYearsOfService::class,
            \App\Employee\CalculateTotalHoursWorked::class,
            \App\Employee\SortEmployeesByTotalHoursWorked::class,
        ];

        $employees = Employee::all();

        // return app(Pipeline::class)
        //     ->send($employees)
        //     ->through($pipelines)
        //     ->thenReturn();

        return app(PipelinePipeline::class)
            ->send($employees)
            ->through($pipelines)
            ->thenReturn();
        // ->paginate();
    }
}

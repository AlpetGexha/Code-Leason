<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Benchmark;
use Illuminate\Support\Facades\Pipeline;

class UserSearchController extends Controller
{
    public function __invoke(Request $request)
    {
        // http://127.0.0.1:8000/api/user/search?name=a&email=@example.org&sortBy=name&sort=desc
        $pipelines = [
            \App\Filter\ByDate::class,
            \App\Filter\ByName::class,
            \App\Filter\ByEmail::class,
            \App\Filter\SortBy::class,
        ];

        $query = User::query()
            ->when($request->has('date'), function ($query) use ($request) {
                $query->where('created_at', 'REGEXP', $request->date);
            })
            ->when($request->has('name'), function ($query) use ($request) {
                $query->where('name', 'REGEXP', $request->name);
            })
            ->when($request->has('email'), function ($query) use ($request) {
                $query->where('email', 'REGEXP', $request->email);
            })
            ->when($request->hasAny(['sort', 'sortBy']), function ($query) use ($request) {
                $sort = $request->sort ?? 'asc';
                $sortBy = $request->sortBy ?? 'created_at';

                $query->orderBy($sortBy, $sort);
            })
            ->paginate(15);

        $pipeline = Pipeline::send(User::query())
            ->through($pipelines)
            ->thenReturn()
            ->paginate();

        // Pipeline vs Query for speed
        // Benchmark::dd([
        //     'test' => fn () => info('test'), // 0.215ms
        //     'Query' => fn () => response()->json(['query' => $query]), // 43.515ms
        //     'Pipeline' => fn () => response()->json(['pipeline' => $pipeline]), // 10.628ms
        // ]);

        return response()->json([
            'query' => $query,
            'pipeline' => $pipeline,
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class testController extends Controller
{
    public function test()
    {
        $todos = DB::table('todos')->get();
        // return view('test', [
        //     'todos' => $todos
        // ]);

        return view('test')->with('todos', $todos);
    }
}

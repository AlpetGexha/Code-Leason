<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Todo;

class TodoController extends Controller
{
    public function index()
    {
        // Eloquent
        $todos = Todo::orderBy('id')->simplePaginate(15);
        $done = Todo::where('completed ', 1)->count();
        $notDone = Todo::where('completed ', 0)->count();


        return view('todo', [
            'todos' => $todos,
            'done' => $done,
            'notDone'  => $notDone,
        ]);

        /* 
        $todos = DB::table('todos')->simplePaginate(15);//get()
        return view('todo',[
            'todos' => $todos
        ]);
        */
        // return view('todo')->with('todos', $todos);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManyToManyController extends Controller
{
    public function index()
    {
        return view('many-to-many.show');
    }
}

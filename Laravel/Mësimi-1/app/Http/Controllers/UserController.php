<?php
/*
    php artisan make:controller UserController
*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index ($name, $surname, $age = 0) {
    // $tagname = "<script> alert('$name');s </script>";
    // return "Hello $name!";
    // return view('welcome');
/*
    shkon te faili resorse/views/"emri"
    nuk ka  nevoj per  prapashtese
*/
    return view('hello', [
        "name" => $name,
        "surename" => $surname,
        "age" => $age
       // "tagname" => $tagname
    ]); //name .php ose name.blade.php
}
}

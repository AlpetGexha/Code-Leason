<?php

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


# webite/emri
# duhet te kete patjeter "{}"
# "name?" - jo opsional
                                            //Shko te UserController ,Thirre metoden index
Route::get('/{name}/{surname}/{age?}', [UserController::class, 'index']);

# GET, POST, PUT, PATCH, DELETE, ANY, MATCH
Route::get('/{name}/{surname}/{age?}', function ($name, $surname, $age = 0) {
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
})->where('age', '[0-9]+'); //where " ku age eshte int  "


Route::get('/Service', function () {
    return "Service";
})->name("Service"); //Ermri i  rutes


Route::get('/about/{limit}', function ($limit) {
    if ($limit >= 5) {
        return redirect()->route('Service');
    }
    return "aboutus";
});




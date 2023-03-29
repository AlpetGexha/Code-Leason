<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ChangeUserPicController;

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

Route::get('/', function () {
/*
    if(request()->method() == "GET"){
        abort(403,"Nuk mund te kqyeqeni ne kete faqe");
    }
*/


    return view('welcome',
        [
            'username'=>'Alpet Gexha',
            'age'=> 16,
            'subject' => ["TIK","SO","Praktik","Matematik"]
        ]
    );
});
Route::get('/php', function () {
    return view('welcome-php');
});

Route::match(["get", "post"],'/home', [ApplicationController::class , 'home'])->name('home');

Route::get('/about',[ApplicationController::class , 'about'])->name('about');
Route::post('/login',[ApplicationController::class , 'login'])->name('login');



//single action controller
Route::get('/user/pic',ChangeUserPicController::class)->name('userpic');

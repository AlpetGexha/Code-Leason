<?php
//namespace
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArticalColntroller;
use App\Http\Controllers\Controller;

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

# GET, POST, PUT, PATCH, DELETE, ANY, MATCH

# webite/emri
# duhet te kete patjeter "{}"
# "name?" - jo opsional

Route::resource('article', ArticalColntroller::class);
                                            //Shko te UserController ,Thirre metoden index
Route::get('/{name}/{surname}/{age}', [UserController::class, 'index'])->where('age', '[0-9]+');

//ka funkionin e te gjitha routerave
Route::any('/any-type-route', [Controller::class, 'any_type'])->name('any_type');

Route::match(["post", "delete"], '/match', [Controller::class, 'match'])->name('match');


//Route::get('/{name}/{surname}/{age?}', function ($name, $surname, $age = 0) {
//    // $tagname = "<script> alert('$name');s </script>";
//    // return "Hello $name!";
//    // return view('welcome');
///*
//    shkon te faili resorse/views/"emri"
//    nuk ka  nevoj per  prapashtese
//*/
//    return view('hello', [
//        "name" => $name,
//        "surename" => $surname,
//        "age" => $age
//       // "tagname" => $tagname
//    ]); //name .php ose name.blade.php
//})->where('age', '[0-9]+'); //where " ku age eshte int  "
//

Route::get('/Service', function () {
    return "Service";
})->name("Service"); //Ermri i  rutes


Route::get('/about/{limit}', function ($limit) {
    if ($limit >= 5) {
        return redirect()->route('Service');
    }
    return "aboutus";
});







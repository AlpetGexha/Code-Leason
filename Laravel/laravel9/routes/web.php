<?php

use App\Enums\PostStatus;
use App\Http\Controllers\PostController;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;

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
    //threw new exception
    // throw new Exception('This is new style of exception');
    return view('welcome');
})->name('ballina');

/****************** Redirect *****************/
Route::get('/ballina', function () {
    // laravel 8
    // return redirect()->route('ballina');

    // laravel 9
    return to_route('ballina');
});

/****************** Blade render *****************/
Route::get('/blade', function () {
    return  Blade::render('Hello ez{{ $name }}', [
        'name' => 'Alpet',
    ]);
});

/****************** Scope Binding *****************/
// laravel 8

Route::get('/l8/user/{user}/post/{post:id}', function (User $user, Post $post) {
    $post = User::findOrFail($user->id)->posts()->findOrFail($post->id);
    return $post;
});

// laravel 9
Route::get('/l9/user/{user}/post/{post:id}', function (User $user, Post $post) {
    return $post;
})->scopeBindings();

/****************** Laravel Scout *****************/

Route::get('/search/{search?}', function ($search = 'Adipisci ') {
    $post = Post::search($search)->get(); //to search for a specific word
    return $post->count(); //count the number of results
    return $post;
});

/****************** Full Text Search *****************/

Route::get('/fullsearch/{search?}', function ($search = 'Adipisci ') {
    $post = Post::whereFullText('body', $search)->get(); //to search for a specific word
    return $post->count(); //count the number of results
    return $post;
});

/****************** Enum *****************/

Route::get('/enum/create', function () {

    // To create a new Post with enum
    $post = (new Post);

    $post->user_id = 1; //fake user id
    $post->title = 'My first post'; //title
    $post->body = 'My Body'; //body
    $post->status = PostStatus::Publiced; //public enum

    $post->save();

    return 'Post Created with Enum';

    // return dd(PostStatus::Public);
});

Route::get('/enum/show', function () {

    // To show a Posts enum
    $posts = (new Post); //call post model 

    //get random post
    $post = $posts->inRandomOrder()->first()->status;

    if ($post === PostStatus::Publiced) {
        return 'Your random Post its Public Staus';
    }
    if ($post === PostStatus::Draft) {
        return 'Your random Post its Draft Staus';
    }
    if ($post === PostStatus::Privated) {
        return 'Your random Post its Privat Staus';
    }
});

/****************** Blade render *****************/



/****************** Route Controller *****************/
// After
Route::get('/post/{post}', [PostController::class, 'show']);
Route::post('/post', [PostController::class, 'store']);
Route::put('/post/{post}', [PostController::class, 'update']);
Route::delete('/post/{post}', [PostController::class, 'destroy']);
// Php artisan route:list

// Before
Route::group(['controller' => PostController::class], function () {
    Route::get('/post/{post}', 'show');
    Route::post('/post', 'store');
    Route::put('/post/{post}', 'update');
    Route::delete('/post/{post}', 'destroy');
});

<?php

use App\Http\Controllers\Api\V1\UserController;
use Illuminate\Support\Facades\Route;

Route::get('user/{user:id}', [UserController::class, 'show'])->scopeBindings();
Route::get('users', [UserController::class, 'index']);

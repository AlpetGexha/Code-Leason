<?php

namespace App\Http\Controllers\Api\V2;

use App\Http\Controllers\Controller;
use App\Http\Resources\V2\UserResource;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);

        return UserResource::collection($users);
    }

    public function show(User $user)
    {
        return UserResource::make($user);
    }
}

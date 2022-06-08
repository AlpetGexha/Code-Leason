<?php

namespace App\Actions;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CreateNewUser
{
    public function handle(Request $request)
    {
        $avatar = ($request->hasFile('avatar'))
            ? $request->file('avatar')->store('avatars')
            : NULL;

        return User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'avatar' => $avatar
        ]);
    }
}

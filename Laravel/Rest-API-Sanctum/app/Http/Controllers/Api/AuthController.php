<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $r)
    {
        $field = $r->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|confirmed',
        ]);

        $user = User::create([
            'name' => $field['name'],
            'email' => $field['email'],
            'password' => Hash::make($field['password']),
        ]);

        // API Token
        // PlainTextToken - Lloji i tokenit per API
        $token = $user->createToken('authToken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token,
        ];

        return response()->json($response, Response::HTTP_CREATED);
    }

    public function login(Request $r)
    {
        $field = $r->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
        // check email
        $user = User::where('email', $field['email'])->first();

        // check password
        if (!$user || !Hash::check($field['password'], $user->password)) {
            return response()->json([
                'message' => 'Invalid Login',
            ], Response::HTTP_UNAUTHORIZED);
        }

        // API Token
        // PlainTextToken - Lloji i tokenit per API
        $token = $user->createToken('authToken')->plainTextToken;

        $response = [
            'message' => 'Login Successful',
            'user' => $user,
            'token' => $token,
        ];

        return response()->json($response, Response::HTTP_CREATED);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response()->json(['message' => 'Logout success'], Response::HTTP_OK);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

class OAuthController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        try {
            $githubUser = Socialite::driver($provider)->user();
        } catch (\Exception $e) {
            return redirect()->route('login');
        }

        $user = User::firstOrCreate([
            'provider_id' => $githubUser->id,
        ],
            [
                'name' => $githubUser->name,
                'email' => $githubUser->email,
//                'profile_photo_pafth' => $githubUser->avatar,
            ]
        );

        auth()->login($user);

        return redirect()->to('/dashboard');

    }

}

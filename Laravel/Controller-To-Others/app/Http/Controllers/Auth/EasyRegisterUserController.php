<?php

namespace App\Http\Controllers\Auth;

use App\Actions\CreateNewUser;
use App\Events\NewUserRegistered;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Jobs\NewUserNotifyAdminsJob;
use App\Models\User;
use App\Models\Voucher;
use App\Notifications\NewUserNotify;
use App\Providers\RouteServiceProvider;
use App\Services\UserService;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Str;

class EasyRegisterUserController extends Controller
{
    public function store(StoreUserRequest $request, UserService $userService, CreateNewUser $createNewUser)
    {
        /**
         * Service method
         */
        // $user = $userService->createUser($request);
        $avatar = $userService->uploadAvatar($request);
        $user = $userService->createUser($request->validated() + ['avatar' => $avatar]);
        Auth::login($user);
        $userService->notifyUser($user);

        // Job
        NewUserNotifyAdminsJob::dispatch($user);

        // event
        NewUserRegistered::dispatch($user);

        /**
         * Action methods
         */
        $user = $createNewUser->handle($request);


        return redirect(RouteServiceProvider::HOME);
    }
}

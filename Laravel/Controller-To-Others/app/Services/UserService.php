<?php

namespace App\Services;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use App\Models\Voucher;
use App\Notifications\NewUserNotify;
use App\Notifications\NewUserWelcomeNotification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use  Illuminate\Support\Str;

/**
 * Class UserService
 * @package App\Services
 */
class UserService
{
    public function createUser(StoreUserRequest $request): User
    {
        // Create user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Avatar upload and update user
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar')->store('avatars');
            $user->update(['avatar' => $avatar]);
        }

        return $user;
    }

    public function uploadAvatar(StoreUserRequest $request): ?string
    {
        return ($request->hasFile('avatar'))
            ? $request->file('avatar')->store('avatars')
            : NULL;
    }

    public function createUserMethod2(array $userData): User
    {
        return User::create([
            'name' => $userData['name'],
            'email' => $userData['email'],
            'password' => Hash::make($userData['password']),
            // 'avatar' => $userData['avatar']
        ]);
    }
    public function createVoucherForUser(int $userId): string
    {
        $voucher = Voucher::create([
            'code' => Str::random(8),
            'discount_percent' => 10,
            'user_id' => $userId
        ]);

        return $voucher->code;
    }

    public function notifyUser(User $user): void
    {
        $voucherCode = $this->createVoucherForUser($user->id);
        $user->notify(new NewUserWelcomeNotification($voucherCode));
    }

    public function notifyAdmin()
    {
        $emails = User::where('is_admin', true)->get()->email;-
        foreach ($emails as $adminEmail) {
            Notification::send($adminEmail, new NewUserNotify($adminEmail));
        }
    }
}

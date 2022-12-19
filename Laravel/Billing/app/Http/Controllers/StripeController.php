<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function index()
    {
        return view('subscribe', [
            'intent' => auth()->user()->createSetupIntent()
        ]);
    }

    public function indexGive()
    {
        return view('give-subscribe', [
            'intent' => auth()->user()->createSetupIntent()
        ]);
    }

    public function pay(Request $request)
    {
        $request->validate([
            'plan' => 'required',
            'paymentMethod' => 'required',
        ]);

        $request->user()
            ->newSubscription('cashier', $request->plan)
            ->withCoupon($request->coupon)
            ->create($request->paymentMethod);

        return to_route('subscribe.get')
            ->with('status', "Congratulations! You're now subscribed to {$request->plan} plan");
    }

    public function giveSubscription(Request $request)
    {
        $request->validate([
            'plan' => 'required',
            'paymentMethod' => 'required',
            'user_id' => 'required',
        ]);
        $user = User::find($request->user_id);

        // check if user exists
        if (!$user) {
            return back()
                ->with('error', 'User not found')
                ->withInput();
        }

        // check if user has a subscription
        if ($user->subscribed('cashier')) {
            return back()
                ->with('error', 'User already has a subscription')
                ->withInput();
        }

        // give subscription
        $user
            ->newSubscription('cashier', $request->plan)
            ->create($request->paymentMethod);
        // $user->invoice();
        // notify user

        return to_route('subscribe.give')
            ->with('status', "Congratulations! You're give subscribed to {$user->name} ");
    }
}

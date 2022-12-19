<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SingleCharge extends Controller
{
    public function pay(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'paymentMethod' => 'required',
        ]);

        $euro = 10;
        auth()->user()->charge($euro * 100, $request->paymentMethod);

        return to_route('charge.get')
            ->with('status', "Congratulations! You're have made a single PAYMENT of {$euro} €");
    }

    public function index()
    {
        return view('single-charge', [
            'intent' => auth()->user()->createSetupIntent()
        ]);
    }
}

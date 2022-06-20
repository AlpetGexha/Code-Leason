<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\LazyCollection;

class HomeController extends Controller
{
    public function __invoke()
    {
        $users = User::all();

        $names = [];

        $time_start = microtime(true);
        /**
         * Array Method
         */
        foreach ($users as $user) {

            if (!in_array($user->name, ['Alpet', 'Albin', 'Eden', 'Ermal', 'Erion', 'Glauk', 'Sali', 'Ben'])) {
                if (!array_key_exists($user->name, $names)) {
                    $names[$user->name] = 0;
                }
                $names[$user->name]++;
            }
        }
//        dd($names);
//
        arsort($names);

        $time_end = microtime(true);
        echo 'Array result: ' . number_format($time_end - $time_start, 4) . 's <hr>';

        /**
         * Collection Method
         */
        $time_start = microtime(true);

        $names = collect($users)
            ->map(fn($value) => $value->name)
            ->filter(fn($value) => !in_array($value, ['Alpet', 'Albin', 'Eden', 'Ermal', 'Erion', 'Glauk', 'Sali', 'Ben']))
            ->groupBy(fn($value) => $value)
            ->mapWithKeys(fn($value, $key) => [$key => count($value)])
            ->sortDesc();

        $time_end = microtime(true);
        echo 'Collect result: ' . number_format($time_end - $time_start, 4) . 's <hr>';

        $time_start = microtime(true);

        /**
         * LazyCollection Method
         */
        $names = LazyCollection::make(function () {
            $users = User::all();
            foreach ($users as $user) {
                yield $user->name;
            }
        })->map(fn($value) => $value->name)
            ->filter(fn($value) => !in_array($value, ['Alpet', 'Albin', 'Eden', 'Ermal', 'Erion', 'Glauk', 'Sali', 'Ben']))
            ->groupBy(fn($value) => $value)
            ->mapWithKeys(fn($value, $key) => [$key => count($value)])
            ->sortDesc();

        $time_end = microtime(true);
        echo 'Lazy Collect result: ' . number_format($time_end - $time_start, 4) . 's <hr>';


        /**
         * LazyCollection Method with Modal
         */
        $time_start = microtime(true);

        $users = User::cursor()->filter(function ($user) {
            return $user->id ;
        });



        $time_end = microtime(true);
        echo 'Modal LazyCollect result: ' . number_format($time_end - $time_start, 4) . 's <hr>';

        echo ' ' . count($users) . ' users ';

        die();

        return view('dashboard', compact('names'));

    }
}

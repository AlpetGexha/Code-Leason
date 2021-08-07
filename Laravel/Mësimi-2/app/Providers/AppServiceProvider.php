<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Blade::directive("sayHello", function ($value){
           return "Hello $value";
        });

        \Blade::directive("toUpperCase", function ($value){
            return strtoupper($value);
        });

        //per te shperdar ne te gjita  rootat ($title)
        view()->share('title', 'This is  best title ');
    }
}

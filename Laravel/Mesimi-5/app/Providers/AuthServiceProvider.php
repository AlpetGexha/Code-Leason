<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\User;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
       'App\Models\Post' => 'App\Policies\PostPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        /*  Ne blade thirren @can('name') ose  @cannot('name')
        @can - mund ta besh funkssionin 
        @cannot - Nuk mund ta besh funksionin
        */
        
        Gate::define('delete-post', function (User $user, Post $post) {
            return $user->id === $post->user_id; // nese user dhe user  id eshte e njejt ateher shafaqe dicka
        });

        // Gate::define('edit-post', function (User $user, Post $post) {
        //     return $user->id === $post->user_id; // nese user dhe user  id eshte e njejt ateher shafaqe dicka
        // });
    }
}

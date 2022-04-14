<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    public function boot()
    {
        $this->registerPolicies();


        Gate::define('admin', function ($user) {
            return $user->role_id === 1;
        });

        Gate::define('moderator', function ($user) {
            return $user->role_id === 2;
        });

        Gate::define('users', function ($user) {
            return $user->role_id === 3;
        });

        Gate::define('general', function ($user) {
            return $user->role_id === 1 || $user->role_id === 2;
        });
    }
}

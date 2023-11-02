<?php

namespace App\Providers;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('staff_admin', function(User $user){

            return ($user->role === 'staff' || $user->role === 'admin');

        });

        Gate::define('admin', function(User $user){

            return $user->role === 'admin';

        });

        Gate::define('staff', function(User $user){

            return $user->role === 'staff';

        });

        Gate::define('client', function(User $user){

            return $user->role === 'client';

        });
    }

}

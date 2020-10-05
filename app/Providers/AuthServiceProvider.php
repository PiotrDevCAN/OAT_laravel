<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Services\Auth\IBMGuard;
use App\Extensions\IBMUserProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Auth::provider('IBM', function ($app, array $config) {
            // Return an instance of Illuminate\Contracts\Auth\UserProvider...
            
            return new IBMUserProvider($app['hash'], $config['model']);
        });

//         Auth::extend('ibm', function ($app, $name, array $config) {
//             // Return an instance of Illuminate\Contracts\Auth\Guard...

//             return new IBMGuard(Auth::createUserProvider($config['provider']));
//         });

//         Auth::extend('pin', function (Container $app) {
//             return new PinGuard($app['request']);
//         });
    }
}

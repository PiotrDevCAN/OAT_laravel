<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Services\Auth\IBMGuard;
use App\Auth\IBMUserProvider;

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
        
//         Auth::extend('ibm', function ($app, $name, array $config) {
//             // Return an instance of Illuminate\Contracts\Auth\Guard...

//             return new IBMGuard(Auth::createUserProvider($config['provider']));
//         });
        
//         Auth::extend('header', function ($app, $name, array $config) {
//             return $app->make(\App\Auth\HeaderGuard::class, [
//                 'name' => $name,
//                 'config' => $config,
//                 'provider' => $app['auth']->createUserProvider(
//                     $config['provider'] ?? null
//                     )
//             ]);
//         });
        
//         Auth::extend('IBMUser', function ($app, $name, array $config) {
//             return $app->make(\App\Auth\IBMUserGuard::class, [
//                 'name' => $name,
//                 'config' => $config,
//                 'provider' => $app['auth']->createUserProvider(
//                     $config['provider'] ?? null
//                 )
//             ]);
//         });
        
//         Auth::provider('external-api', function ($app, $config) {
//             return $app->make(\App\Auth\ApiUserProvider::class, [
//                 'config' => $config,
//             ]);
//         });
        
        Auth::provider('external-api', function ($app, array $config) {
            // Return an instance of Illuminate\Contracts\Auth\UserProvider...
            
            return $app->make(\App\Auth\IBMUserProvider::class, [
                'hash' => $app['hash'],
            ]);
//             return new \App\Auth\IBMUserProvider($app['hash']);
        });
    }
}

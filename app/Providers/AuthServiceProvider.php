<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Auth\BluepageUserGuard;
use App\Auth\BluepageUserProvider;

use App\Auth\BluegroupGuestUserProvider;

use App\Auth\BluegroupAdminUserProvider;
use App\Auth\BluegroupGuestUserGuard;
use App\Auth\BluegroupAdminUserGuard;


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
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Since the Auth Manager doesn't have to be called in every Request, we will just
        // set a callback before the application resolves it and passes it where it was
        // called.
        $this->app->resolving('auth', function ($auth) {
            
            Auth::extend('bluepage-guard', function ($app, $name, array $config) {
                return $app->make(BluepageUserGuard::class, [
                    'name' => $name,
                    'provider' => $app['auth']->createUserProvider(
                        $config['provider'] ?? null
                        ),
                    'session' => $app['session.store']
                ]);
            });
            
            Auth::provider('bluepage-provider', function ($app, array $config) {
                // Return an instance of Illuminate\Contracts\Auth\UserProvider...
                
                return $app->make(BluepageUserProvider::class, [
                    'hasher' => $app['hash'],
                ]);
            });
            
            Auth::extend('bluegroup-guest-guard', function ($app, $name, array $config) {
                return $app->make(BluegroupGuestUserGuard::class);
            });
            
            Auth::provider('bluegroup-guest-provider', function ($app, array $config) {
                // Return an instance of Illuminate\Contracts\Auth\UserProvider...
                
                return $app->make(BluegroupGuestUserProvider::class, [
                    'hasher' => $app['hash'],
                ]);
            });
            
            Auth::extend('bluegroup-admin-guard', function ($app, $name, array $config) {
                return $app->make(BluegroupAdminUserGuard::class);
            });
            
            Auth::provider('bluegroup-admin-provider', function ($app, array $config) {
                // Return an instance of Illuminate\Contracts\Auth\UserProvider...
                
                return $app->make(BluegroupAdminUserProvider::class, [
                    'hasher' => $app['hash'],
                ]);
            });
        });
    }
}

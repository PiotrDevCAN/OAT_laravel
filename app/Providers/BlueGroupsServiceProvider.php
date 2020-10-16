<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helpers\BlueGroups\BlueGroupsService;
use Adldap\AdldapInterface;
use Adldap\Laravel\Facades\Adldap;

class BlueGroupsServiceProvider extends ServiceProvider
{
    /**
     * @var bool
     */
    protected $defer = false;
    
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $ldap = Adldap;
        $this->app->singleton('BlueGroups', function ($app, $ldap) {
            
            dump($ldap);
            
            dd();
            return new BlueGroupsService($ldap);
        });
    }

    /**
     * @return array
     */
    public function provides()
    {
        return array('BlueGroups');
    }
    
}

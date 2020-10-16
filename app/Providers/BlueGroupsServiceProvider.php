<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helpers\BlueGroups\BlueGroupsService;
use Adldap\AdldapInterface;

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
        $this->app->singleton('BlueGroups', function ($app, $ldap, $ldap2, $ldap3) {
            
            dump($ldap);
            dump($ldap2);
            dump($ldap3);
            
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

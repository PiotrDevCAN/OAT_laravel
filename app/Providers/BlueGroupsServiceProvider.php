<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helpers\BlueGroups\BlueGroupsService;
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
        $this->app->singleton('BlueGroups', function () {
            
            $adldap = Adldap::getFacadeRoot();
            
            return new BlueGroupsService($adldap);
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

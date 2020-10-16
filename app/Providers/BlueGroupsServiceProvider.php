<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helpers\BlueGroups\BlueGroupsService;

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
            return new BlueGroupsService();
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

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helpers\BlueGroupsCurl\BlueGroupsService;

class BlueGroupsCurlServiceProvider extends ServiceProvider
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
        $this->app->singleton('BlueGroupsCurl', function () {
            return new BlueGroupsService();
        });
    }

    /**
     * @return array
     */
    public function provides()
    {
        return array('BlueGroupsCurl');
    }
    
}

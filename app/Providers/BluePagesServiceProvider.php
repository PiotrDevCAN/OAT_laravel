<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helpers\BluePages\BluePagesService;

class BluePagesServiceProvider extends ServiceProvider
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
        $this->app->singleton('BluePages', function () {
            return new BluePagesService();
        });
    }

    /**
     * @return array
     */
    public function provides()
    {
        return array('BluePages');
    }
    
}

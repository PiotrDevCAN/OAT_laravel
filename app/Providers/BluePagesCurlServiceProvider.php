<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helpers\BluePagesCurl\BluePagesService;

class BluePagesCurlServiceProvider extends ServiceProvider
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
        $this->app->singleton('BluePagesCurl', function () {
            return new BluePagesService();
        });
    }

    /**
     * @return array
     */
    public function provides()
    {
        return array('BluePagesCurl');
    }
    
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helpers\BluePagesCurl\BluePagesCurlService;

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
        $this->app->singleton('BluePagesCurl', function () {
            return new BluePagesCurlService();
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

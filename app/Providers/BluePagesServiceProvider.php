<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helpers\BluePages\BluePagesService;

class BluePagesServiceProvider extends ServiceProvider
{
    /**
     * @var bool
     */
//     protected $defer = false;
    
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        dump('REGISTER method');
        
        $this->app->singleton(BluePagesService::class, function () {
            return new BluePagesService();
        });
    }
    
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        dump('BOOT method');
    }
    
    /**
     * @return array
     */
//     public function provides()
//     {
//         return array(BluePagesService::class);
//     }
    
}

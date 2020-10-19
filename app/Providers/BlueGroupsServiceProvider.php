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
//     protected $defer = false;
    
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        dump('REGISTER method');
        dump(BlueGroupsService::class);
        
        $this->app->singleton(BlueGroupsService::class, function ($app) {
            
            $adldap = Adldap::getFacadeRoot();
            
            return new BlueGroupsService($adldap);
        });
        
//         $this->app->singleton('SmsService', function($app){
//             return new SmsService;
//         });
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
//         return array(BlueGroupsService::class);
//     }
    
}

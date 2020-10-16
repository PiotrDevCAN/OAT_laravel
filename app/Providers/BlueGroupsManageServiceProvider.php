<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helpers\BlueGroupsManage\BlueGroupsManageService;

class BlueGroupsManageServiceProvider extends ServiceProvider
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
        $this->app->singleton('BlueGroupsManage', function () {
            return new BlueGroupsManageService();
        });
    }
    
    /**
     * @return array
     */
    public function provides()
    {
        return array('BlueGroupsManage');
    }
    
}


<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\View\Components\IbmV18Form\Input;
use App\View\Components\IbmV18Form\Select;
use App\View\Components\IbmV18Form\Textarea;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::component('ibmv18form-input', Input::class);
        Blade::component('ibmv18form-select', Select::class);
        Blade::component('ibmv18form-textarea', Textarea::class);
    }
}

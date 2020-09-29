<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\View\Components\IbmV18Form\Input;
use App\View\Components\IbmV18Form\Select;
use App\View\Components\IbmV18Form\Textarea;
use Illuminate\Support\Facades\Blade;
use App\View\Components\IbmV18Form\Button;
use App\Models\OvertimeRequest;
use App\Models\Account;
use App\Models\Competency;
use App\Models\Delegate;
use App\Models\Log;
use App\Observers\AccountObserver;
use App\Observers\CompetencyObserver;
use App\Observers\DelegateObserver;
use App\Observers\LogObserver;
use App\Observers\OvertimeRequestObserver;

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
        Account::observe(AccountObserver::class);
        Competency::observe(CompetencyObserver::class);
        Delegate::observe(DelegateObserver::class);
        Log::observe(LogObserver::class);
        OvertimeRequest::observe(OvertimeRequestObserver::class);
        
        Blade::component('ibmv18form-input', Input::class);
        Blade::component('ibmv18form-select', Select::class);
        Blade::component('ibmv18form-textarea', Textarea::class);
        Blade::component('ibmv18form-button', Button::class);
    }
}

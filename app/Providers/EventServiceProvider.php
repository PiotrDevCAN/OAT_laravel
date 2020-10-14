<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        
        'App\Events\IndexEntered' => [
            'App\Listeners\SentIndexEnteredNotification',
        ],
        
        'App\Events\OvertimeRequestApproved' => [
            'App\Listeners\SentOvertimeRequestApprovedNotification',
        ],
        'App\Events\OvertimeRequestRejected' => [
            'App\Listeners\SentOvertimeRequestRejectedNotification',
        ],
        
        'Illuminate\Cache\Events\CacheHit' => [
            'App\Listeners\LogCacheHit',
        ],
        'Illuminate\Cache\Events\CacheMissed' => [
            'App\Listeners\LogCacheMissed',
        ],
        'Illuminate\Cache\Events\KeyForgotten' => [
            'App\Listeners\LogKeyForgotten',
        ],
        'Illuminate\Cache\Events\KeyWritten' => [
            'App\Listeners\LogKeyWritten',
        ],
        
        'Illuminate\Auth\Events\Attempting' => [
            'App\Listeners\LogAuthenticationAttempt',
        ],
        'Illuminate\Auth\Events\Authenticated' => [
            'App\Listeners\LogAuthenticated',
        ],        
        'Illuminate\Auth\Events\Login' => [
            'App\Listeners\LogSuccessfulLogin',
        ],
        'Illuminate\Auth\Events\Failed' => [
            'App\Listeners\LogFailedLogin',
        ],
        'Illuminate\Auth\Events\Logout' => [
            'App\Listeners\LogSuccessfulLogout',
        ],
        
        'Aacotroneo\Saml2\Events\Saml2LoginEvent' => [
            'App\Listeners\Saml2LoginListener',
        ],
        'Aacotroneo\Saml2\Events\Saml2LogoutEvent' => [
            'App\Listeners\Saml2LogoutListener',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}

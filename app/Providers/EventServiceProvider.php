<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Adldap\Adldap;
use App\Listeners\Adldap\AttemptingListener;
use App\Listeners\Adldap\PassedListener;
use App\Listeners\Adldap\FailedListener;
use App\Listeners\Adldap\BindingListener;
use App\Listeners\Adldap\BoundListener;

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
            'App\Listeners\SendIndexEnteredNotification',
        ],
        
        'App\Events\OvertimeRequestApproved' => [
            'App\Listeners\SendOvertimeRequestApprovedNotification',
        ],
        'App\Events\OvertimeRequestRejected' => [
            'App\Listeners\SendOvertimeRequestRejectedNotification',
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
        
        /*
         * Default listeners
         */
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
        
        /*
         * Adldap listeners
         */
        'Adldap\Laravel\Events\Authenticating' => [
            'App\Listeners\LogAuthenticating',
        ],
        
        'Adldap\Laravel\Events\Authenticated' => [
            'App\Listeners\LogLdapAuthSuccessful',
        ],
        
        'Adldap\Laravel\Events\AuthenticationSuccessful' => [
            'App\Listeners\LogAuthSuccessful'
        ],
        
        'Adldap\Laravel\Events\AuthenticationFailed' => [
            'App\Listeners\LogAuthFailure',
        ],
        
        'Adldap\Laravel\Events\AuthenticationRejected' => [
            'App\Listeners\LogAuthRejected',
        ],
        
        'Adldap\Laravel\Events\AuthenticatedModelTrashed' => [
            'App\Listeners\LogUserModelIsTrashed',
        ],
        
        'Adldap\Laravel\Events\AuthenticatedWithCredentials' => [
            'App\Listeners\LogAuthWithCredentials',
        ],
        
        'Adldap\Laravel\Events\AuthenticatedWithWindows' => [
            'App\Listeners\LogSSOAuth',
        ],
        
        'Adldap\Laravel\Events\DiscoveredWithCredentials' => [
            'App\Listeners\LogAuthUserLocated',
        ],
        
        'Adldap\Laravel\Events\Importing' => [
            'App\Listeners\LogImportingUser',
        ],
        
        'Adldap\Laravel\Events\Synchronized' => [
            'App\Listeners\LogSynchronizedUser',
        ],
        
        'Adldap\Laravel\Events\Synchronizing' => [
            'App\Listeners\LogSynchronizingUser',
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
        
//         $dispatcher = Adldap::getEventDispatcher();
        
//         $dispatcher->listen(\Adldap\Auth\Events\Attempting::class, AttemptingListener::class);
        
//         $dispatcher->listen(\Adldap\Auth\Events\Passed::class, PassedListener::class);
        
//         $dispatcher->listen(\Adldap\Auth\Events\Failed::class, FailedListener::class);
        
//         $dispatcher->listen(\Adldap\Auth\Events\Binding::class, BindingListener::class);
        
//         $dispatcher->listen(\Adldap\Auth\Events\Bound::class, BoundListener::class);
    }
}

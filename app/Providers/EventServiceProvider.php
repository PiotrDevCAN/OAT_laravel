<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Adldap\Adldap;

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
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
        
        $dispatcher = Adldap::getEventDispatcher();
        
        $dispatcher->listen(\Adldap\Auth\Events\Attempting::class, function ($event) {
            dump('Attempting');
        });
            
        $dispatcher->listen(\Adldap\Auth\Events\Passed::class, function ($event) {
            dump('Passed');
        });
            
        $dispatcher->listen(\Adldap\Auth\Events\Failed::class, function ($event) {
            $connection = $event->connection;
            
            $host = $connection->getHost();
            
            echo $host; // Displays 'ldap://192.168.1.1:386'
            
            dd($event);
            
        });
            
        $dispatcher->listen(\Adldap\Auth\Events\Bound::class, function ($event) {
            dump('Bound');
        });
            
        dump($dispatcher);

    }
}

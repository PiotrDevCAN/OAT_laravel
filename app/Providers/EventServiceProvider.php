<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use Adldap\Adldap;
use App\Listeners\BlueGroupsListener;
use Adldap\Auth\Events\Binding;
use Adldap\Auth\Events\Failed;

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

        $dispatcher->listen(Binding::class, BlueGroupsListener::class);

//         $dispatcher->listen(Failed::class, function (Failed $event) {
//             $conn = $event->connection;
            
//             echo $conn->getLastError(); // 'Invalid credentials'
//             echo $conn->getDiagnosticMessage(); // '80090308: LdapErr: DSID-0C09042A, comment: AcceptSecurityContext error, data 532, v3839'
            
//             if ($error = $conn->getDetailedError()) {
//                 $error->getErrorCode(); // 49
//                 $error->getErrorMessage(); // 'Invalid credentials'
//                 $error->getDiagnosticMessage(); // '80090308: LdapErr: DSID-0C09042A, comment: AcceptSecurityContext error, data 532, v3839'
//             }
//         });
        
        /*
        $dispatcher->listen(Binding::class, function (Binding $event) {
            // Do something with the Binding event information:
            $event->connection; // Adldap\Connections\Ldap instance
            $event->username; // 'jdoe@acme.org'
            $event->password; // 'super-secret'
        });
        */
    }
}

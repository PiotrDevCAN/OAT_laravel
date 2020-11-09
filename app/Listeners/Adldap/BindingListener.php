<?php

namespace App\Listeners\Adldap;

use Adldap\Auth\Events\Binding;

class BindingListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    
    /**
     * Handle the event.
     *
     * @param  Binding  $event
     * @return void
     */
    public function handle(Binding $event)
    {
        //
        echo('Adldap Binding <br>');
    }
}

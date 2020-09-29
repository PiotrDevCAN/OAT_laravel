<?php

namespace App\Listeners;

use App\Events\OvertimeRequestRejected;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\Request\OvertimeRequestRejected;

class SentOvertimeRequestRejectedNotification
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
     * @param  OvertimeRequestRejected  $event
     * @return void
     */
    public function handle(OvertimeRequestRejected $event)
    {
        Mail::to('piotr.tajanowicz@ibm.com')
//             ->cc($moreUsers)
//             ->bcc($evenMoreUsers)
            ->send(new \App\Mail\Request\OvertimeRequestRejected($event->request));
    }
}

<?php

namespace App\Listeners;

use App\Events\OvertimeRequestApproved;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SentOvertimeRequestApprovedNotification
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
     * @param  OvertimeRequestApproved  $event
     * @return void
     */
    public function handle(OvertimeRequestApproved $event)
    {
        Mail::to('piotr.tajanowicz@ibm.com')
//             ->cc($moreUsers)
//             ->bcc($evenMoreUsers)
            ->send(new OvertimeRequestApproved($event->request));
    }
}

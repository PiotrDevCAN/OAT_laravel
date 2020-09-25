<?php

namespace App\Observers;

use App\Models\OvertimeRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\OvertimeRequestCreated;
use App\Mail\OvertimeRequestUpdated;
use App\Mail\OvertimeRequestDeleted;

class OvertimeRequestObserver
{
    /**
     * Handle the obvertime request "created" event.
     *
     * @param  \App\Models\OvertimeRequest  $OvertimeRequest
     * @return void
     */
    public function created(OvertimeRequest $OvertimeRequest)
    {
        Mail::to('piotr.tajanowicz@ibm.com')
        //             ->cc($moreUsers)
        //             ->bcc($evenMoreUsers)
        ->send(new OvertimeRequestCreated($overtimeRequest));
    }

    /**
     * Handle the obvertime request "updated" event.
     *
     * @param  \App\Models\OvertimeRequest  $OvertimeRequest
     * @return void
     */
    public function updated(OvertimeRequest $OvertimeRequest)
    {
        Mail::to('piotr.tajanowicz@ibm.com')
        //             ->cc($moreUsers)
        //             ->bcc($evenMoreUsers)
        ->send(new OvertimeRequestUpdated($overtimeRequest));
    }

    /**
     * Handle the obvertime request "deleted" event.
     *
     * @param  \App\Models\OvertimeRequest  $OvertimeRequest
     * @return void
     */
    public function deleted(OvertimeRequest $OvertimeRequest)
    {
        Mail::to('piotr.tajanowicz@ibm.com')
        //             ->cc($moreUsers)
        //             ->bcc($evenMoreUsers)
        ->send(new OvertimeRequestDeleted($overtimeRequest));
    }

    /**
     * Handle the obvertime request "restored" event.
     *
     * @param  \App\Models\OvertimeRequest  $OvertimeRequest
     * @return void
     */
    public function restored(OvertimeRequest $OvertimeRequest)
    {
        //
    }

    /**
     * Handle the obvertime request "force deleted" event.
     *
     * @param  \App\Models\OvertimeRequest  $OvertimeRequest
     * @return void
     */
    public function forceDeleted(OvertimeRequest $OvertimeRequest)
    {
        //
    }
}

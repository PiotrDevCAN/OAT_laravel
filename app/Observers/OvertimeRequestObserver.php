<?php

namespace App\Observers;

use App\Models\OvertimeRequest;

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
        //
    }

    /**
     * Handle the obvertime request "updated" event.
     *
     * @param  \App\Models\OvertimeRequest  $OvertimeRequest
     * @return void
     */
    public function updated(OvertimeRequest $OvertimeRequest)
    {
        //
    }

    /**
     * Handle the obvertime request "deleted" event.
     *
     * @param  \App\Models\OvertimeRequest  $OvertimeRequest
     * @return void
     */
    public function deleted(OvertimeRequest $OvertimeRequest)
    {
        //
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

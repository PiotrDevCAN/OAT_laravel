<?php

namespace App\Observers;

use App\Models\Competency;

class CompetencyObserver
{
    /**
     * Handle the competency "created" event.
     *
     * @param  \App\Models\Competency  $competency
     * @return void
     */
    public function created(Competency $competency)
    {
        //
    }

    /**
     * Handle the competency "updated" event.
     *
     * @param  \App\Models\Competency  $competency
     * @return void
     */
    public function updated(Competency $competency)
    {
        //
    }

    /**
     * Handle the competency "deleted" event.
     *
     * @param  \App\Models\Competency  $competency
     * @return void
     */
    public function deleted(Competency $competency)
    {
        //
    }

    /**
     * Handle the competency "restored" event.
     *
     * @param  \App\Models\Competency  $competency
     * @return void
     */
    public function restored(Competency $competency)
    {
        //
    }

    /**
     * Handle the competency "force deleted" event.
     *
     * @param  \App\Models\Competency  $competency
     * @return void
     */
    public function forceDeleted(Competency $competency)
    {
        //
    }
}

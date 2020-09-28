<?php

namespace App\Mail;

use App\Models\OvertimeRequest;

class OvertimeRequestUpdated extends OvertimeRequestBase
{
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        parent::render();
        
        return $this->markdown('emails.request.updated');
    }
}

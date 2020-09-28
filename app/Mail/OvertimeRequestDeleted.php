<?php

namespace App\Mail;

use App\Models\OvertimeRequest;

class OvertimeRequestDeleted extends OvertimeRequestBase
{
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(OvertimeRequest $overtimeRequest)
    {
        parent::build($overtimeRequest);
        
        return $this->markdown('emails.request.deleted');
    }
}

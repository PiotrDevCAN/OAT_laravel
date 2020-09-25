<?php

namespace App\Mail;

class OvertimeRequestDeleted extends OvertimeRequestBase
{
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.request.deleted');
    }
}

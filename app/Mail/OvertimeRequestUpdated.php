<?php

namespace App\Mail;

class OvertimeRequestUpdated extends OvertimeRequestBase
{
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.request.updated');
    }
}

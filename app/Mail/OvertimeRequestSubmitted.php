<?php

namespace App\Mail;

class OvertimeRequestSubmitted extends OvertimeRequestBase
{
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->previewUrl = route('request.submittedMailable', ['overtimeRequest' => $this->$request->reference]);
        
        return $this->markdown('emails.request.submitted');
    }
}

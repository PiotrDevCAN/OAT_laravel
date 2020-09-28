<?php

namespace App\Mail;

class OvertimeRequestCreated extends OvertimeRequestBase
{
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->previewUrl = route('request.createdMailable', ['overtimeRequest' => $this->request->reference]);
        
        return $this->markdown('emails.request.created');
    }
}

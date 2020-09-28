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
        $this->previewUrl = route('request.updatedMailable', ['overtimeRequest' => $this->request->reference]);
        
        return $this->markdown('emails.request.updated');
    }
}

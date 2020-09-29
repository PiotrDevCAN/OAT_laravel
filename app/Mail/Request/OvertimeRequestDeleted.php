<?php

namespace App\Mail\Request;

class OvertimeRequestDeleted extends OvertimeRequestBase
{
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->previewUrl = route('request.deletedMailable', ['overtimeRequest' => $this->request->reference]);
        
        return $this->markdown('emails.request.deleted');
    }
}

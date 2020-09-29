<?php

namespace App\Mail\Index;

class IndexEntered extends Mailable
{
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.index.entered');
    }
}

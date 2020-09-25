<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\OvertimeRequest;

class OvertimeRequestSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The request instance.
     *
     * @var OvertimeRequest
     */
    public $request;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(OvertimeRequest $overtimeRequest)
    {
        $this->request = $overtimeRequest;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = array(
            'url' => 'link_some_page'
        );
        
        return $this->markdown('emails.request.submitted', $data);
    }
}

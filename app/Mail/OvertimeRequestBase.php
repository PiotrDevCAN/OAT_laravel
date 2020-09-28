<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\OvertimeRequest;

class OvertimeRequestBase extends Mailable
{
    use Queueable, SerializesModels;
    
    public $requestEditUrl;
    
    /**
     * The order instance.
     *
     * @var Request
     */
    public $request;
    
    /**
     * Create a new message instance.
     *
     * @param  \App\Model\OvertimeRequest  $overtimeRequest
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
    public function build(OvertimeRequest $overtimeRequest)
    {
        $this->requestEditUrl = route('request.edit', ['overtimeRequest' => $this->request->reference]);
    }
}

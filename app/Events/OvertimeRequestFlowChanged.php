<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\OvertimeRequest;

class OvertimeRequestFlowChanged
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $request;
    
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(OvertimeRequest $overtimeRequest)
    {
        $this->request = $overtimeRequest;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}

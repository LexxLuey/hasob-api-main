<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AssetCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $type;
    public $serial_number;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($type, $serial_number)
    {
        $this->type     = $type;
        $this->serial_number  = $serial_number;
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

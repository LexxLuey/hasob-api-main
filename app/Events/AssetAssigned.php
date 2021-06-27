<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AssetAssigned
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $asset_id;
    public $assigned_by;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($asset_id, $assigned_by)
    {
        $this->asset_id     = $asset_id;
        $this->assigned_by  = $assigned_by;
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

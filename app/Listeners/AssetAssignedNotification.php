<?php

namespace App\Listeners;

use App\Events\AssetAssigned;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AssetAssignedNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  AssetAssigned  $event
     * @return void
     */
    public function handle(AssetAssigned $event)
    {
        $data = [
            'asset_id'   => $event->asset_id,
            'assigned_by'   => $event->assigned_by,
            'message' => 'Notification send successfully',
        ];

        Notification::send($event, new AssetAssignedNotification($data));

        Log::info('Notification send successfully');
        echo ('Notification send successfully');
    }
}

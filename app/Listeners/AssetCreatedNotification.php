<?php

namespace App\Listeners;

use App\Events\AssetCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AssetCreatedNotification
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
     * @param  AssetCreated  $event
     * @return void
     */
    public function handle(AssetCreated $event)
    {
        $data = [
            'asset_id'   => $event->asset_id,
            'assigned_by'   => $event->assigned_by,
            'message' => 'Notification send successfully',
        ];

        Log::info('Notification send successfully');
        echo ('Notification send successfully');
        echo $data;
    }
}

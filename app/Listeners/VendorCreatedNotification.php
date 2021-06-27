<?php

namespace App\Listeners;

use App\Events\VendorCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class VendorCreatedNotification
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
     * @param  VendorCreated  $event
     * @return void
     */
    public function handle(VendorCreated $event)
    {
        $data = [
            'name'   => $event->name,
            'category'   => $event->category,
            'message' => 'Notification send successfully',
        ];

        Log::info('Notification send successfully');
        echo ('Notification send successfully');
        echo $data;
    }
}

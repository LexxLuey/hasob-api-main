<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Log;
use Illuminate\Queue\InteractsWithQueue;

use App\Notifications\NewUserNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;

class SendUserNotification
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        // dd($event->fname);

        $data = [
            'fname'   => $event->fname,
            'message' => 'Notification send successfully',
        ];

        Notification::send($event, new NewUserNotification($data));

        Log::info('Notification send successfully');
        echo ('Notification send successfully');
    }
}

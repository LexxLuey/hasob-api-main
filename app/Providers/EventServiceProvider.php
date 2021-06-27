<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        'App\Events\UserCreated' => [
            'App\Listeners\SendUserNotification',
        ],
        'App\Events\AssetCreated' => [
            'App\Listeners\AssetCreatedNotification',
        ],
        'App\Events\VendorCreated' => [
            'App\Listeners\VendorCreatedNotification',
        ],
        'App\Events\AssetAssigned' => [
            'App\Listeners\AssetAssignedNotification',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

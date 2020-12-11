<?php

namespace App\Providers;

use App\Events\Employees\InstantMailEvent;
use App\Events\Employees\NewEmployeeRegistrationEvent;
use App\Listeners\Employees\SendEmployeeAccountDetails;
use App\Listeners\Employees\InstantMailListener;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

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
        NewEmployeeRegistrationEvent::class => [
            SendEmployeeAccountDetails::class,
        ],
        InstantMailEvent::class => [
            InstantMailListener::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}

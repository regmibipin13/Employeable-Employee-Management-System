<?php

namespace App\Listeners\Employees;

use App\Events\Employees\NewEmployeeRegistrationEvent;
use App\Notifications\Employees\EmployeeRegistrationNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendEmployeeAccountDetails
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
     * @param  NewEmployeeRegistrationEvent  $event
     * @return void
     */
    public function handle(NewEmployeeRegistrationEvent $event)
    {
        $event->user->notify(new EmployeeRegistrationNotification($event->user, $event->token));
    }
}

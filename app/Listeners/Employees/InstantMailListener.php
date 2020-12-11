<?php

namespace App\Listeners\Employees;

use App\Events\Employees\InstantMailEvent;
use App\Mail\Employees\InstantMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class InstantMailListener implements ShouldQueue
{
    use Queueable;
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
     * @param  InstantMailEvent  $event
     * @return void
     */
    public function handle(InstantMailEvent $event)
    {
        Mail::to($event->data['email'])
            ->queue(new InstantMail($event->data));
    }
}

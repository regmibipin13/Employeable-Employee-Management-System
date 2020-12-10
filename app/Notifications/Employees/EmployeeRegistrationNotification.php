<?php

namespace App\Notifications\Employees;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EmployeeRegistrationNotification extends Notification
{
    use Queueable;

    public $user, $token;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user , $token)
    {
        $this->user = $user;
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->greeting("Namaste ". $this->user->name)
            ->line('Your new Employee Account for SmartEMS is ready to go')
            ->line('Please Confirm its you and continue by clicking on the confirm button below')
            ->action('Confirm', url('/employees/password/reset/'.$this->token).'?email='.$this->user->email)
            ->line('Thank you for using SmartEMS');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}

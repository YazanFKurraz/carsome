<?php

namespace App\Notifications;

use App\Models\Car;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class AddCarByUser extends Notification
{
    use Queueable;

    private $car;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Car $car)
    {
        $this->car = $car;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'id' => $this->car->id,
            'title' => 'Add car to by user : ',
            'user' => Auth::user()->name
        ];
    }



}

<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OffersNotification extends Notification
{
    use Queueable;
    private $offerData;
    public $message;
    public $checkout_id;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($message, $checkout_id)
    {
        $this->message     = $message;
        $this->checkout_id = $checkout_id;

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

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */


    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'message'     => $this->message,
            'checkout_id' => $this->checkout_id,
        ];
    }
}

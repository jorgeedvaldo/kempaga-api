<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class GeneralNotification extends Notification
{
    use Queueable;

    private $title;
    private $body;
    private $payload;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(string $title, string $body, array $payload = [])
    {
        $this->title = $title;
        $this->body = $body;
        $this->payload = $payload;
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
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return array_merge([
            'title' => $this->title,
            'body' => $this->body,
        ], $this->payload);
    }
}

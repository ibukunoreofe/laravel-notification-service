<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;

class GeneralNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected string $notificationType;
    protected string $title;
    protected ?string $message;

    public function __construct(string $notificationType, string $title, ?string $message)
    {
        $this->notificationType = $notificationType;
        $this->title = $title;
        $this->message = $message;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * @throws \Exception
     */
    public function toMail($notifiable)
    {
        $handlers = app('notification.handlers');

        if (!isset($handlers[$this->notificationType])) {
            throw new \Exception("Notification handler for type {$this->notificationType} not found.");
        }

        $handlerClass = $handlers[$this->notificationType];
        $handler = app($handlerClass);

        return $handler->handle($this->title, $this->message);
    }
}

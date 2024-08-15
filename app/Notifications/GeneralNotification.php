<?php

namespace App\Notifications;

use App\Contracts\NotificationHandlerInterface;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
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
     * @param User $notifiable
     * @return void
     * @throws \Exception
     */
    public function toMail($notifiable)
    {
        $handlers = app('notification.handlers');

        if (!isset($handlers[$this->notificationType])) {
            throw new \Exception("Notification handler for type {$this->notificationType} not found.");
        }

        $handlerClass = $handlers[$this->notificationType];

        /**
         * @var Mailable|NotificationHandlerInterface $handler
         */
        $handler = app($handlerClass);

        return $handler->handle($this->title, $this->message)
            ->to($notifiable->routeNotificationFor('mail', $this));
    }
}

<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class GeneralNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $notificationType;
    protected $title;
    protected $message;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($notificationType, $title, $message)
    {
        $this->notificationType = $notificationType;
        $this->title = $title;
        $this->message = $message;
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
        switch ($this->notificationType) {
            case 'alert':
                return (new MailMessage)
                    ->subject('Important Alert Notification')
                    ->view('emails.alert_notification', [
                        'alertTitle' => $this->title,
                        'alertMessage' => $this->message,
                    ]);
            case 'news':
                return (new MailMessage)
                    ->subject('Latest News Update')
                    ->view('emails.news_notification', [
                        'newsTitle' => $this->title,
                        'newsMessage' => $this->message,
                    ]);
            case 'subscription':
                return (new MailMessage)
                    ->subject('Subscription Confirmation')
                    ->view('emails.subscription_confirmation', [
                        'notificationType' => $this->title,
                    ]);
            case 'update':
                return (new MailMessage)
                    ->subject('Important Update Notification')
                    ->view('emails.updates_notification', [
                        'updateTitle' => $this->title,
                        'updateMessage' => $this->message,
                    ]);
            default:
                return (new MailMessage)
                    ->subject('General Notification')
                    ->line($this->message);
        }
    }
}

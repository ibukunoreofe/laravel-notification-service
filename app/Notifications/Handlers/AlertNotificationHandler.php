<?php

namespace App\Notifications\Handlers;

use App\Contracts\NotificationHandlerInterface;
use App\Mail\AlertNotificationMail;
use Illuminate\Mail\Mailable;

class AlertNotificationHandler implements NotificationHandlerInterface
{
    public function handle($title, $message): Mailable
    {
        return new AlertNotificationMail($title, $message);
    }
}

<?php

namespace App\Notifications\Handlers;

use App\Contracts\NotificationHandlerInterface;
use App\Mail\NewsNotificationMail;
use Illuminate\Mail\Mailable;

class NewsNotificationHandler implements NotificationHandlerInterface
{
    public function handle($title, $message): Mailable
    {
        return new NewsNotificationMail($title, $message);
    }
}

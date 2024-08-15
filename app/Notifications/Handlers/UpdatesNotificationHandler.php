<?php

namespace App\Notifications\Handlers;

use App\Contracts\NotificationHandlerInterface;
use App\Mail\UpdatesNotificationMail;
use Illuminate\Mail\Mailable;

class UpdatesNotificationHandler implements NotificationHandlerInterface
{
    public function handle($title, $message): Mailable
    {
        return new UpdatesNotificationMail($title, $message);
    }
}

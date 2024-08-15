<?php

namespace App\Notifications\Handlers;

use App\Contracts\NotificationHandlerInterface;
use App\Mail\SubscriptionConfirmationMail;
use Illuminate\Mail\Mailable;

class SubscriptionConfirmationHandler implements NotificationHandlerInterface
{
    public function handle($title, $message): Mailable
    {
        return new SubscriptionConfirmationMail($title);
    }
}
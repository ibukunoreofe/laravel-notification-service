<?php

namespace App\Contracts;

use Illuminate\Mail\Mailable;
use Illuminate\Notifications\Messages\MailMessage;

interface NotificationHandlerInterface
{
    public function handle($title, $message): MailMessage|Mailable;
}

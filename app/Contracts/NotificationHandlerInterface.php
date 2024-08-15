<?php

namespace App\Contracts;

use Illuminate\Mail\Mailable;
use Illuminate\Notifications\Messages\MailMessage;

interface NotificationHandlerInterface
{
    /**
     * @param string $title
     * @param string|null $message
     * @return MailMessage|Mailable
     */
    public function handle(string $title, ?string $message): MailMessage|Mailable;
}

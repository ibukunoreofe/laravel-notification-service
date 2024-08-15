<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SubscriptionConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $notificationType;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($notificationType)
    {
        $this->notificationType = $notificationType;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Subscription Confirmation')
            ->markdown('emails.subscription_confirmation');
    }
}

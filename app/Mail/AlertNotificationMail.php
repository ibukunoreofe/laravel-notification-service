<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AlertNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $alertTitle;
    public $alertMessage;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($alertTitle, $alertMessage)
    {
        $this->alertTitle = $alertTitle;
        $this->alertMessage = $alertMessage;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Important Alert Notification')
            ->markdown('emails.alert_notification');
    }
}

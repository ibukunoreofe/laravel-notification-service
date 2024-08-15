<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AlertNotificationMail extends Mailable
{
    use Queueable;
    use SerializesModels;

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
        return $this->view('emails.alert_notification')
            ->subject('Important Alert Notification');
    }
}

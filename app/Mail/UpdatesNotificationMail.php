<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UpdatesNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $updateTitle;
    public $updateMessage;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($updateTitle, $updateMessage)
    {
        $this->updateTitle = $updateTitle;
        $this->updateMessage = $updateMessage;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Important Update Notification')
            ->markdown('emails.updates_notification');
    }
}

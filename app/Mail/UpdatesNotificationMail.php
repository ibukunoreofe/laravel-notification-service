<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UpdatesNotificationMail extends Mailable
{
    use Queueable;
    use SerializesModels;

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
        return $this->view('emails.updates_notification')
            ->subject('Important Update Notification');
    }
}

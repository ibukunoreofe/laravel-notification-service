<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewsNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $newsTitle;
    public $newsMessage;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($newsTitle, $newsMessage)
    {
        $this->newsTitle = $newsTitle;
        $this->newsMessage = $newsMessage;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.news_notification')
            ->subject('Latest News Update');
    }
}

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ExceptionOccured extends Mailable
{
    use Queueable, SerializesModels;

    public $content, $css;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($content, $css)
    {
        $this->css = $css;
        $this->content = $content;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.exception')->with('content', $this->content)->with('css', $this->css);
    }
}

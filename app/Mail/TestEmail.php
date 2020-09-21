<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TestEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $content;
    public $file;
    public $subject;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($content,$file,$subject)
    {
        $this->content = $content;        
        $this->file = $file;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)
            ->view('emails.testemail')
            ->with(['content' => $this->content]);
        //return $this->view('emails.testemail');
    }
}

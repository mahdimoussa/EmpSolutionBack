<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class newRegistrationsMail extends Mailable
{
    use Queueable, SerializesModels;

    public $count;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($c)
    {
        $this->count = $c;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.newRegistrations')->with('count', $this->count);
    }
}

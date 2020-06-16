<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;    
    
    public $contacts;

    public function __construct($contacts)
    {
        $this->contacts = $contacts ;
    }
    
    /**
    * Build the message.
    *
    * @return $this
    */
    public function build()
    {
        return $this->from('santoro.robe@gmail.com')
                    ->view('emails.contactmail');
    }
}

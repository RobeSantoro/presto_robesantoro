<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RevisorMail extends Mailable
{
    use Queueable, SerializesModels;

    public $Revisor;

    public function __construct($Revisor)
    {
        $this->Revisor = $Revisor ;
    }

    public function build()
    {
        return $this->from('santoro.robe@gmail.com')
                    ->view('emails.Revisormail');
    }
}

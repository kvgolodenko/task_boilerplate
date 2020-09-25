<?php


namespace App\Http;


use Illuminate\Mail\Mailable;

class Usermail extends Mailable
{
    public $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    public function build()
    {
        return $this->view($this->message->body);
    }
}

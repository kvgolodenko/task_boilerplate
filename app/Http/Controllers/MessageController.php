<?php


namespace App\Http\Controllers;


class MessageController
{
    public function index()
    {
        //@TODO Load all the message with recipients count

        // @TODO Display data on index page using blade
    }

    public function create()
    {

        // @TODO return create view
    }

    public function store()
    {
        // @TODO validation using request class

        //@TODO Save the model

        //@TODO Save recipients

        //@TODO Save body as file

        return view('message.create');
    }

    public function send()
    {
        // @TODO Send the message

        // @TODO Push email to queue

        // @TODO Redirect back to index
    }
}

<?php


namespace App\Http\Controllers;


use App\Models\Message;

class MessageController
{
    public function index()
    {
        //@TODO Load all the message with recipients count

        return view('message.index');
    }

    public function create(){

        return view('message.create');
    }

    public function store(){
        // @TODO validation

        //@TODO Save the model

        //@TODO Save recipients

        //@TODO Save body as file

        return view('message.create');
    }
}

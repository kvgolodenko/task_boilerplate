<?php


namespace App\Http\Controllers;


use App\Models\Message;
use App\Models\MessageRecipient;
use App\Models\Student;
use App\Models\Traits\Messegeable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class MessageController
{
    use ValidatesRequests;
    use Messegeable;

    public function index()
    {
        //@TODO Load all the message with recipients count

        // @TODO Display data on index page using blade
        $messages = Message::all();

        return view('messages.index', ['messages' => $messages]);
    }

    public function create()
    {
        //@TODO Collect all messageable data from database and show in <select>

        // @TODO return create view

        $users = $this->getUsers();
        return view('messages.create',['users' => $users]);
    }

    public function store(Request $request)
    {
        // @TODO validation using request class

        //@TODO Save the model

        //@TODO Save recipients

        //@TODO Save body as file


        $isValid = $this->validate($request, [
            'user_select' => 'required',
            'subject' => 'required|max:255',
            'body' => 'required'
        ]);

        if ($isValid) {
            $message = new Message();
            $message->subject = $request->input('subject');
            $message->body = $request->input('body');
            $message->save();

            $selected = $request->input('user_select');
            foreach ($selected as $item) {
                $itemArr = explode(',',$item);
                $recipient = new MessageRecipient([
                    'recipient_id' => $itemArr[0],
                    'email' => $itemArr[1],
                    'recipient_type' => $itemArr[2]
                ]);
                $message->recipients()->save($recipient);
            }


        }

        return redirect('/');

    }

    public function send()
    {
        // @TODO Send the message

        // @TODO Push email to queue

        // @TODO Redirect back to index
    }
}

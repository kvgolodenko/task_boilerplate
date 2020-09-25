<?php


namespace App\Http\Controllers;


use App\Jobs\SendEmail;
use App\Models\Message;
use App\Models\MessageRecipient;
use App\Models\Traits\Messegeable;
use \Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\View;

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
        return view('messages.create',['users' => $users,'selectedUsers' => Collection::empty()]);
    }

    public function edit(Request $request)
    {
        $users = $this->getUsers();
        $id = $request->route('message_id');
        $message = Message::find($id);
        $content = $this->getFileContent($message->body);
        $selectedUsers = $message->recipients;
        /** @var Collection $arr */

        return view('messages.create',[
            'users' => $users,'subject' => $message->subject,
            'body' => $content,'selectedUsers' => $selectedUsers,
            'id' => $id
        ]);
    }

    public function remove(Request $request)
    {
        $id = $request->route('message_id');

        if ($id ) {
            $message = Message::find($id);
            $message->delete();
        }

        return redirect('/');

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
        $id = $request->input('model_id');

        if ($isValid) {
            $message = $id ? Message::find($id) : new Message();
            $message->subject = $request->input('subject');
            $message->body = $this->makeFile($request->input('body'));
            $message->save();

            $selected = $request->input('user_select');
            $recipients = $message->recipients();
            if ($id) { $recipients->delete(); }

            foreach ($selected as $item) {
                $itemArr = explode(',',$item);

                $repData = [
                    'recipient_id' => $itemArr[0],
                    'email' => $itemArr[1],
                    'recipient_type' => $this->modelName($itemArr[2])
                ];

                $recipient = new MessageRecipient($repData);
                $recipients->save($recipient);

            }
        }

        return redirect('/');

    }

    public function send(Request $request)
    {
        // @TODO Send the message

        // @TODO Push email to queue

        // @TODO Redirect back to index
        $id = $request->route('message_id');
        $message = Message::find($id);
        $recipients = MessageRecipient::whereMessageId($id)->get();

        foreach ($recipients as $recipient) {
            try {
                Queue::push(new SendEmail($recipient,$message));
                $message->sent = 1;
                $message->save();
            } catch (\Exception $exception) {
                Log::alert($exception->getMessage());
            }
        }

        return redirect('/');
    }


    public function modelName($tableName)
    {
        return 'App\\Models\\' . substr(ucfirst($tableName),'0',strlen(ucfirst($tableName)) - 1);
    }

    public function makeFile(string $content)
    {
        $filename = uniqid();
        $path = '../resources/views/emails/' . $filename .'.html';
        File::put($path, $content);

        return 'emails.'.$filename;
    }

    public function getFileContent(string $body)
    {
        $filename = explode('.',$body)[1];
        $path = '../resources/views/emails/' . $filename . '.html';
        return File::get($path);
    }
}

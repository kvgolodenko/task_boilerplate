<?php


namespace App\Http\Controllers;


use App\Models\Staff;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Traits\Messegeable;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;


class UserController
{
    use ValidatesRequests;
    use Messegeable;

    public const TYPE_STUDENT = 1;
    public const TYPE_TEACHER = 2;
    public const TYPE_STAFF = 3;


    public function store(Request $request)
    {
        $isValid = $this->validate($request,[
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|email',
            'type-select' =>'in:1,2,3'
        ]);

        if ($isValid) {
            switch ($request['type-select']) {
                case self::TYPE_STUDENT:
                    $model = new Student();
                    break;
                case self::TYPE_TEACHER:
                    $model = new Teacher();
                    break;
                case self::TYPE_STAFF:
                    $model = new Staff();
                    break;
            }
           $model->firstname = $request->input('firstname');
           $model->lastname = $request->input('lastname');
           $model->email = $request->input('email');
           $model->save();

           return redirect('/users');
        }
    }

    public function users()
    {
        $users = $this->getUsers();
        return view('user.index', ['users' => $users]);
    }

}

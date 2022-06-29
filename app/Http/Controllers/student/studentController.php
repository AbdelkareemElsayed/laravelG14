<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use  App\Models\student;
use Illuminate\Http\Request;

class studentController extends Controller
{
    //


    function __construct()
    {
          $this->middleware('studentCheck',['except' => ['create','store']]);
    }


    public function index()
    {

        // select * from users  . . .

        // $count =  student :: where('id',300) -> get()->count();
        // dd($count)

        $students =  student::get(); // get all students
        return view('students.index', ['data' => $students]);

    }

    #############################################################################################################
    public function create()
    {

        return view('students.create');
    }

    ##############################################################################################################

    public function store(Request $request)
    {

        $data =  $this->validate($request, [
            'name'     => "required",
            'email'    => "required|email",
            'password' => "required|min:6",
            'image'    => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ]);


        # Hashing the password before saving it to the database
        $data['password']  = bcrypt($data['password']);


        # Uploading the image to the server
        $imageName = time() . uniqid() . '.' . $request->image->extension();

        $request->image->move(public_path('images/students'), $imageName);

        $data['image'] = $imageName;


        $op =  student::create($data);    // insert into users (name,email,passsowrd) values ($data['name'],$data['email'],$data['password'])

        if ($op) {
            $message = "Student Created Successfully";
            session()->flash('Message-success', $message);
        } else {
            $message = "Student Not Created";
            session()->flash('Message-error', $message);
        }

        return redirect(url('Students/Create'));
    }

    ##############################################################################################################
    public function edit($id)
    {

        # Fetch data
        //  $student = student :: where('id',$id)->get();    // $student[0]->name
        $student  = student::find($id);                // $student->name

        return view('students.edit', ['data' => $student]);
    }

    ##############################################################################################################

    public function update(Request $request, $id)
    {
        // update . . .


        $data =  $this->validate($request, [
            'name'     => "required",
            'email'    => "required|email",
            'password' => 'nullable|min:6',
        ]);


        if ($request->has('changePassword')) {

            $data['password']  = bcrypt($request->password);
        } else {
            unset($data['password']);
        }



        $op = student::where('id', $id)->update($data);

        if ($op) {
            $message = "Student Updated Successfully";
            session()->flash('Message-success', $message);
        } else {
            $message = "Student Not Updated";
            session()->flash('Message-error', $message);
        }

        return redirect(url('Students'));
    }


    ##############################################################################################################


    public function remove(Request $request)
    {
        // code . . .

        # Fetch User Data . . .
        $student = student::find($request->id);

        $op =   student::where('id', $request->id)->delete();   // delete from users where id = $id

        if ($op) {

            # Remove image . . .
            unlink(public_path('images/students/' . $student->image));

            $message = "Student Removed Successfully";
            session()->flash('Message-success', $message);
        } else {
            $message = "Student Not Removed";
            session()->flash('Message-error', $message);
        }

        return redirect(url('Students'));
    }






}

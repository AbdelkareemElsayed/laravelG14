<?php

namespace App\Http\Controllers;

use  App\Models\student;
use Illuminate\Http\Request;

class studentController extends Controller
{
    //


    public function index(){
       // select * from users  . . .

       $students =  student :: get(); // get all students


     return view('students.index',['data' => $students]);
    }

    #############################################################################################################
    public function create(){

        return view('students.create');
    }

    ##############################################################################################################

    public function store(Request $request){


      $data =  $this->validate($request,[
            'name'     => "required",
            'email'    => "required|email",
            'password' => "required|min:6",
          ]);


          # Hashing the password before saving it to the database
          $data['password']  = bcrypt($data['password']);


        $op =  student :: create($data);    // insert into users (name,email,passsowrd) values ($data['name'],$data['email'],$data['password'])

        if($op){
            $message = "Student Created Successfully";
            session()->flash('Message-success',$message);
        }else{
            $message = "Student Not Created";
            session()->flash('Message-error',$message);

        }

        return redirect(url('Students/Create'));
    }



}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userController extends Controller
{
    //


    public function create()
    {

        return   view('users.create');
    }


    public function store(Request $request)
    {

        //   echo $request->name;
        //   echo $request->email;
        //   echo $request->input('name');
        //   dd($request->all());
        //   dd($request->except(['_token','name']));
        //   dd($request->only(['name']));
        // dd($request->has('age'));
        //  dd($request->hasAny(['age','name']));

        //  echo $request->path();

        // echo $request->url();

        // echo $request->fullUrl();

        //  echo $request->method();

        // dd($request->isMethod('post'));

        // echo $request->ip();

        //   $errors = [];

        //   # Validate inputs
        //     if (empty($request->name)) {
        //         $errors['name'] = 'Name is required';
        //     }

        //     if (empty($request->email)) {
        //         $errors['email'] = 'Email is required';
        //     }

        //     if (empty($request->password)) {
        //         $errors['password'] = 'Password is required';
        //     }


        //     if(count($errors) > 0){
        //         dd($errors);
        //     }else{
        //         echo 'Valid Data . . .';
        //     }

        $this->validate($request, [
            'name'     => 'required|min:3|max:15',
            'email'    => 'required|email',
            'password' => 'required|min:6'
        ]);


        dd('Valid Data . . . ');
    }



    public function profile()
    {

        $studentData = ["name" => "Root Account", "age" => "20", "email" => "Root@gmail.com"];

        $title = "Profile Page";

        // return view('users.ProfileData',['data' => $studentData , 'title' => $title]);
        //  return view('users.ProfileData')->with('data'  , $studentData )->with('title' , $title);
        //   return view('users.ProfileData')->with(['data' => $studentData , 'title' => $title]);

        return view('users.ProfileData', compact('studentData', 'title'));  // 'studentData' => $studentData  , 'title' => $title

    }




    public function createSession()
    {

        //    session()->put('name','Root Account');    // $_SESSION['name'] = "root Account";

        //     session()->flash('name',"Test Account flash Session . . . ");
        session()->put('name', "20130255. . . ");

        session()->put('level', "3 . . . ");

        // dd("Session Created . . . ");

    }



    public function SessionValues()
    {

        return view('users.sessionValues');
    }
}

<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class authStudentController extends Controller
{
    //


     public function login()
     {
        return view('login');
     }


     public function doLogin(Request $request)
     {

        $data = $this->validate($request,[
            "email"    => "required|email",
            "password" => "required|min:6"
        ]);



         // Auth :: attempt() is a method that checks if the user is authenticated.
         // If the user is authenticated, it will return true.
         // If the user is not authenticated, it will return false.
         //auth()->guard('student')->attempt($data)

         if(auth('student')->attempt($data)){

            return redirect(url('Students'));
         }else{

            session()->flash('Message-error', "Invalid Credentials");

             return back();

         }

     }



     public function Logout(){

            auth('student')->logout();

            return redirect(url('Login'));
     }


}

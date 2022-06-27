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



    }







}

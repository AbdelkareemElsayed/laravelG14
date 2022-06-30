<?php

namespace App\Http\Controllers\api;


use App\Models\User;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;

class userController extends Controller
{
    //

    public function message()
    {
        $message = 'test Api Message ';

        return response()->json(["data" => $message]);
    }
    ###########################################################################################
    // CRUD   - Create , Read , Update , Delete


    public function store(Request $request)
    {


        // $data =  $this->validate($request, [
        //     'name'     => "required",
        //     'email'    => "required|email",
        //     'password' => "required|min:6",
        //     'image'    => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        // ]);



        $validator =   Validator::make($request->all(), [
            'name'     => "required",
            'email'    => "required|email",
            'password' => "required|min:6",
            'image'    => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ]);


        if ($validator->fails()) {
            return response()->json(["error" => $validator->errors()]);
        } else {

            # Fetch Data . . .
            $data = $request->all();

            # Hashing the password before saving it to the database
            $data['password']  = bcrypt($data['password']);


            # Uploading the image to the server
            $imageName = time() . uniqid() . '.' . $request->image->extension();

            $request->image->move(public_path('images/Users'), $imageName);

            $data['image'] = $imageName;


            $op =  User::create($data);

            if ($op) {
                $message = "User Created Successfully";
            } else {
                $message = "User Not Created";
            }


            return response()->json(['Message' => $message]);
        }
    }
    #####################################################################################################

    public function fetchUsers()
    {
        $users = User::get();
        return response()->json(['data' => $users]);
    }
    #####################################################################################################

    public function getUser($id)
    {
        $user = User::find($id);
        return response()->json(['data' => $user]);
    }
    #####################################################################################################



     public function  update(Request $request){


        $validator =   Validator::make($request->all(), [
            'name'     => "required",
            'email'    => "required|email",
            'image'    => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            'id'       => "required|numeric",
        ]);


        if ($validator->fails()) {
            return response()->json(["error" => $validator->errors()]);
        } else {
            // code . . .

            $data = $request->except(['_method']);

            # Find Raw Data . . .
              $Raw = User::find($request->id);

             if($request->has('image')){
                $imageName = time() . uniqid() . '.' . $request->image->extension();
                $request->image->move(public_path('images/Users'), $imageName);
                $data['image'] = $imageName;


                # Delete Old Image . . .
                if(file_exists(public_path('images/Users/'.$Raw->image))){
                    unlink(public_path('images/Users/'.$Raw->image));
                }
             }else{
                $data['image'] = $Raw->image;
             }


            # Update Data . . .
            $op = User::where('id', $request->id)->update($data);

            if ($op) {
                $message = "User Updated Successfully";
            } else {
                $message = "User Not Updated";
            }

            return response()->json(['Message' => $message]);

        }




     }





}

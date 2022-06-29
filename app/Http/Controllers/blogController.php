<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class blogController extends Controller
{


    function __construct()
    {
          $this->middleware('studentCheck');
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $data = DB::table('blogs')
            ->join('students', 'blogs.addedBy', '=', 'students.id')
            ->select('blogs.*', 'students.name', 'students.image as studentImage')
            ->get(); // get all data from blogs table

        return view('blogs.index', ['title' => "List Blogs.", 'data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data =   $this->validate($request, [
            "title"    => "required | min:10 | max : 150",
            "content"  => "required|min:30 | max:15000",
            "date"     => "required|date",
            "image"    => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ]);

        # Uploading the image to the server
        $imageName = time() . uniqid() . '.' . $request->image->extension();

        # Convert data to timestamp
        $data['date'] = strtotime($data['date']);

        $request->image->move(public_path('images/blogs'), $imageName);

        $data['image'] = $imageName;

        $data['addedBy'] = auth('student')->user()->id;

        // DB Query Builder . . .
        $op =   DB::table('blogs')->insert($data);

        if ($op) {
            $message = "Blog Created Successfully";
            session()->flash('Message-success', $message);
        } else {
            $message = "Blog Not Created";
            session()->flash('Message-error', $message);
        }

        return redirect(url('Blogs'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data = DB::table('blogs')
            ->join('students', 'blogs.addedBy', '=', 'students.id')
            ->select('blogs.*', 'students.name', 'students.image as studentImage')
            ->where('blogs.id', $id)
            ->get(); // get all data from blogs table

        return view('blogs.details', ['title' => "Blog dEtails.", 'data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

       $data =   DB :: table('blogs')->find($id);

        return view('blogs.edit',["title" => "Edit Blog.", 'data' => $data]);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

         // DB :: table('blogs')->where('id',$id)->update($data);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        # Fetch Raw Data . . .
        $data = DB::table('blogs')->find($id);
        # DELETE OP . . .
        $op = DB::table('blogs')->where('id', $id)->delete();

        if ($op) {

            # Remove Image . . .
            unlink(public_path('images/blogs/' . $data->image));

            $message = "Blog Deleted Successfully";
            session()->flash('Message-success', $message);
        } else {
            $message = "Blog Not Deleted";
            session()->flash('Message-error', $message);
        }

        return redirect(url('Blogs'));
    }
}

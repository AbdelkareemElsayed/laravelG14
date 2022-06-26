<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('Message/{id}/{name?}',function ($id , $name = null){
      echo 'id = '.$id.' && Name = '.$name;
});


// Route :: get('Profile',function(){

//      return  view('ProfileData');
// });


Route :: view('Profile','ProfileData');


// Route :: get('User/Create',function (){
//         return view('users.create');
//     });

Route::view('Users/Create','users.create');   // uri , view(Folder.file)

Route :: post('Users/Store',function (){

       dd('Post Request'); // dd() is used to display the data in the screen

});







// http://localhost/laravelG14/public/Message?id=2013

// http://localhost/laravelG14/public/Message/2013

/*
get
post
put
patch
delete
resource
view
option
match
callback
*/

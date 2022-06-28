<?php

use App\Http\Controllers\student\authStudentController;
use App\Http\Controllers\userController;
use App\Http\Controllers\student\studentController;
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


// Route::get('Message/{id}/{name?}',function ($id , $name = null){
//       echo 'id = '.$id.' && Name = '.$name;
// });
// Route :: get('Profile',function(){

//      return  view('ProfileData');
// });
// Route :: view('Profile','ProfileData');
// Route :: get('User/Create',function (){
//         return view('users.create');
//     });





//  Route :: get('Message',[userController :: class , 'Message']);


##############################################################################################################

//Route::view('Users/Create', 'users.create');   // uri , view(Folder.file)


Route::get('Users/Create',[userController :: class , 'create']);
Route::post('Users/Store',[userController :: class , 'store']);
Route::get('Users/Profile',[userController :: class , 'profile']);

Route :: get('createSession',[userController :: class , 'createSession']);
Route :: get('sharedSession',[userController :: class , 'SessionValues']);

###############################################################################################################
// STUDENT ROUTES . . .
Route :: get('Students',[studentController :: class , 'index']);
Route :: get('Students/Create',[studentController :: class , 'create']);
Route :: post('Students/Store',[studentController :: class , 'store']);
Route :: get('Student/edit/{id}',[studentController :: class , 'edit']);
Route :: put('Student/update/{id}',[studentController :: class , 'update']);
// Route :: get('Students/Delete/{id}',[studentController :: class , 'remove']);    <a href >
Route :: delete('Students/Delete',[studentController :: class , 'remove']);

###############################################################################################################
// AUTH ROUTES . . .
Route :: get('Login',[authStudentController :: class , 'login']);
Route :: post('DOLogin',[authStudentController :: class , 'doLogin']);
Route :: get('Logout',[authStudentController :: class , 'Logout']);


###############################################################################################################




// php artisan optimize:clear
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

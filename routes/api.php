<?php

use App\Http\Controllers\api\userController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route :: post('User/Store',[userController :: class , 'store']);
Route :: get('User/List',[userController :: class , 'fetchUsers']);
Route :: get('User/List/{id}',[userController :: class , 'getUser']);

Route :: put('User/Update',[userController :: class , 'update']);




Route :: get('Message',[userController :: class , 'message']);

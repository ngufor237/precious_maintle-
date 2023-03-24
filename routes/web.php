<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ScriptWriterController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/home', 'HomePageController@home');
Route::get('/user_creation', 'UserController@show');
Route::post('/create_user', 'UserController@create_user')->name('create_user');
Route::get('/scripwiter_creation', 'ScriptwiterController@show');
Route::post('/create_scriptwriter', 'ScriptwiterController@create_user')->name('create_scriptwriter');
<?php

use Illuminate\Support\Facades\Route;

// // function gravatar_url($email)

// {
//      $email = md5($email);

//     return "https://gravatar.com/avatar/{$email}?s=60&d=https://s3.amazonaws.com/laracasts/images/default-square-avatar.jpg";
// }



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

Route::group(['middleware' => 'auth'], function () {
Route::resource('projects', 'ProjectsController');

Route::post('/projects/{project}/tasks', 'ProjectTasksController@store');
Route::patch('/projects/{project}/tasks/{task}', 'ProjectTasksController@update');

Route::post('/projects/{project}/invitations', 'ProjectInvitationsController@store');

    Route::get('/home', 'HomeController@index')->name('home');
});

Auth::routes();



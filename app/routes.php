<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
/*
Route::get('/', function()
{
	return View::make('hello');
});
*/
Route::get('login', array('uses'=>'SessionsController@create', 'as' => 'login'));
Route::get('/', 'SessionsController@create');
Route::get('logout', array('uses'=>'SessionsController@destroy', 'as' => 'logout'));
Route::get('sessions/create', array('uses'=>'SessionsController@create', 'as'=>'sessions.create'));
Route::post('sessions', array('uses'=>'SessionsController@store', 'as'=>'sessions.store'));

Route::get('forgotpassword', array('uses'=>'UsersController@forgotPassword', 'as' => 'forgot_password'));
Route::post('forgotpassword', array('uses'=>'UsersController@resetPassword', 'as' => 'reset_password'));

Route::get('processpassword', array('uses'=>'UsersController@processPassword', 'as'=>'process_password'));
//Route::resource('users', 'UsersController');
Route::post('users', array('uses'=>'UsersController@store', 'as'=>'users.store'));
Route::get('users/create', array('uses'=>'UsersController@create','as'=>'users.create'));
Route::get('users/verify/{confirmationCode}', array('uses' => 'UsersController@confirm','as' => 'emailConfirmation'));
Route::get('users/unlock/{confirmationCode}', array('uses' => 'UsersController@unlock', 'as' => 'unlockAccount'));

//Route::resource('sessions', "SessionsController");
Route::group(['before' => 'auth'], function(){
    //Route::resource('notes', "NotesController");
    Route::put('notes/{notes}', array('uses'=>'NotesController@update', 'as'=>'notes.update'));
    Route::get('notes/{notes}', array('uses'=>'NotesController@show', 'as'=>'notes.show'));
    Route::get('changepassowrd', array('uses'=>'UsersController@changingPassword', 'as' => 'changing_password'));
    Route::post('changepassowrd', array('uses'=>'UsersController@changePassword', 'as' => 'change_password'));
});

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
Route::get('login', 'SessionsController@create');
Route::get('/', 'SessionsController@create');
Route::get('logout', 'SessionsController@destroy');
Route::get('forgotpassword', array('uses'=>'UsersController@forgotpassword', 'as' => 'forgotpassword'));
Route::post('forgotpassword', array('uses'=>'UsersController@resetpassword', 'as' => 'resetpassword'));
Route::resource('users', 'UsersController');
Route::get('users/verify/{confirmationCode}', [
    'uses' => 'UsersController@confirm',
    'as' => 'emailConfirmation'
]);
Route::resource('sessions', "SessionsController");
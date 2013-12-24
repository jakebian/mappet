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

/*-----------------USER-----------------*/
Route::get('user/activate/{id}', 'UserController@getActivateUser');
Route::controller('user', 'UserController');

Route::resource('place', 'PlaceController');
Route::resource('submap', 'SubmapController');

/*-----------------HOME-----------------*/
Route::get('/', function()
{
	return View::make('home.main');
});
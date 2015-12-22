<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('site.home');
});

Route::get('upload', array('as' => 'upload'), function() {
  return view('site.upload');
});


Route::get('home', 'HomeController@index');
Route::post('home/uploadFiles', 'HomeController@uploadFiles');
Route::get('home/session-{filename}', 'HomeController@removeFile');
Route::get('home/session', 'HomeController@session');
Route::get('home/session-reset', 'HomeController@sessionReset');

Route::get('/logout', 'Auth\AuthController@getLogout');
Route::get('/login', 'Auth\AuthController@getLogin');
Route::post('/login', 'Auth\AuthController@postLogin');

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

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@getIndex']);
Route::get('upload', ['as' => 'upload', 'uses' => 'HomeController@getUpload']);
Route::post('upload', ['as' => 'process.upload', 'uses' => 'HomeController@uploadFiles']);

Route::get('submit', ['as' => 'submit', 'uses' => 'HomeController@getSubmit']);
Route::post('submit', ['as' => 'process.submit', 'uses' => 'HomeController@postSubmit']);

Route::get('thankyou', ['as' => 'thankyou', 'uses' => 'HomeController@getThankyou']);

Route::get('home/session-reset', 'HomeController@sessionReset');
Route::get('home/session-{filename}', 'HomeController@removeFile');
Route::get('home/session', 'HomeController@session');
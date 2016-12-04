<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['prefix' => 'apostas'], function () {
	Route::get('/', 			'ApostaController@index');
	//Route::get('create', 		'ApostaController@create');
	//Route::post('store', 		'ApostaController@store');
	//Route::get('show', 		'ApostaController@show');
	//Route::get('edit', 		'ApostaController@edit');
	//Route::post('update', 	'ApostaController@update');
	//Route::get('destroy', 	'ApostaController@destroy');
});

Route::get('/home', 'HomeController@index');
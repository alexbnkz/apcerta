<?php

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
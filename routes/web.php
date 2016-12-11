<?php

Route::get('/', function () {
	return view('welcome');
});

Auth::routes();

Route::group(['prefix' => 'apostas'], function () {
	Route::get	('/', 					'ApostaController@index');
	Route::get	('create', 				'ApostaController@create');
	Route::post	('save', 				'ApostaController@save');
	Route::get	('find/{id}',			'ApostaController@find');
});

Route::get('/home', 'HomeController@index');
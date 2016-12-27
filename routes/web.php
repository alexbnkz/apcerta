<?php

Route::get('/', function () {
	return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['prefix' => 'apostas'], function () {
	Route::get	('/', 					'ApostaController@index');
	Route::get	('create', 				'ApostaController@create');
	Route::post	('save', 				'ApostaController@save');
	Route::get	('find/{id}',			'ApostaController@find');
});

Route::group(['prefix' => 'megasena'], function () {
	Route::get	('/', 					'MegasenaController@index');
	Route::get	('create', 				'MegasenaController@create');
	Route::post	('save', 				'MegasenaController@save');
	Route::get	('find/{id}',			'MegasenaController@find');
	Route::get	('json',				'MegasenaController@json');
	Route::post	('resultado',			'MegasenaController@resultado');
});

Route::group(['prefix' => 'usuario'], function () {
	Route::get	('/', 					'UserController@index');
	Route::get	('create', 				'UserController@create');
	Route::post	('save', 				'UserController@save');
	Route::get	('find/{id}',			'UserController@find');
	Route::get	('json',				'UserController@json');
});

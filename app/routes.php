<?php

Route::get('/', 'HomeController@indexAction');

Route::group( ['prefix' => 'api'], function() {
	Route::group( ['prefix' => '1.0'], function() {
		Route::resource('songs', 'SongController', ['only' => [ 'index', 'show']]);
	});
	Route::group( ['prefix' => '2.0'], function() {

	});
});

Route::get('/userWithModel', 'UserController@showWithModel');
Route::get('/userWithRepository', 'UserController@showWithRepository');
Route::get('/userWithService', 'UserController@showWithService');
Route::get('/user/{userId}/songs', 'UserController@songsByUser');
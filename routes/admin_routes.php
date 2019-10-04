<?php

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {

	Route::get('items', 'ItemController@index');
	Route::get('items/create', 'ItemController@create');
	Route::post('items/create', 'ItemController@store');
	Route::get('items/{id}/edit', 'ItemController@edit');
	Route::post('items/{id}/edit', 'ItemController@update');
	Route::get('items/{id}/delete', 'ItemController@destroy');
});



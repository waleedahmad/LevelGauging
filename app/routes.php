<?php

/**
 * Unauthenticated Routes
 */
Route::group(['before'	=>	'guest'], function(){

	Route::any('/register',[
		'as'	=>	'register',
		'uses'	=>	'AccountController@register'
	]);

	Route::any('/login',[
		'as'	=>	'login',
		'uses'	=>	'AccountController@login'
	]);
});

/**
 * Authenticated Routes
 */

Route::group(['before'	=>	'auth'], function(){
	Route::get('/', [
		'as' => 'MainView',
		 'uses' => 'TankController@tankers' 
	]);
});	


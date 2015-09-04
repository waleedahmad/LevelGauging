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
		'as' => 'initView',
		 'uses' => 'DashboardController@initView'
	]);

	Route::get('/tank/{id}/dashboard',[
		'as'	=>	'tank-dashboard',
		'uses'	=>	'DashboardController@tankDashboard'
	]);

	Route::get('/tank/{id}/notifications',[
		'as'	=>	'tank-notifications',
		'uses'	=>	'DashboardController@tankNotifications'
	]);

	Route::get('/tank/{id}/details',[
		'as'	=>	'tank-details',
		'uses'	=>	'DashboardController@tankDetails'
	]);

	Route::get('/tank/{id}/data',[
		'as'	=>	'tank-data',
		'uses'	=>	'DashboardController@tankData'
	]);

	Route::get('/tank/{id}/contacts',[
		'as'	=>	'tank-contacts',
		'uses'	=>	'DashboardController@tankContacts'
	]);

	Route::get('/logout', [
		'as' => 'logout',
		 'uses' => 'AccountController@logout'
	]);
});

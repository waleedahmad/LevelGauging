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

	Route::post('/upload/history', [
		'as'	=>	'history-upload',
		'uses'	=>	'DashboardController@uploadHistory'
	]);

	Route::post('/delete/history',[
		'as'	=>	'history-delete',
		'uses'	=>	'DashboardController@deleteHistory'
	]);


	Route::post('/notifications/add/email', [
		'as'	=>	'notification-add-repoting',
		'uses'	=>	'NotificationController@addEmail'
	]);

	Route::post('/notifications/verify/email', [
		'as'	=>	'notification-verify',
		'uses'	=>	'NotificationController@alreadyExist'
	]);

	Route::post('/notifications/details/email', [
		'as'	=>	'notification-details',
		'uses'	=>	'NotificationController@getDetails'
	]);

	Route::post('/notifications/update/email', [
		'as'	=>	'notification-details-update',
		'uses'	=>	'NotificationController@updateEmail'
	]);

	Route::post('/notifications/delete/email', [
		'as'	=>	'notification-details-remove',
		'uses'	=>	'NotificationController@removeEmail'
	]);
});

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

	Route::get('/user/{userid}/tank/{id}/dashboard',[
		'as'	=>	'tank-dashboard',
		'uses'	=>	'DashboardController@tankDashboard'
	]);

	Route::get('/user/{userid}/tank/{id}/notifications',[
		'as'	=>	'tank-notifications',
		'uses'	=>	'DashboardController@tankNotifications'
	]);

	Route::get('/user/{userid}/tank/{id}/details',[
		'as'	=>	'tank-details',
		'uses'	=>	'DashboardController@tankDetails'
	]);

	Route::get('/user/{userid}/tank/{id}/data',[
		'as'	=>	'tank-data',
		'uses'	=>	'DashboardController@tankData'
	]);

	Route::get('/user/{userid}/tank/{id}/contacts',[
		'as'	=>	'tank-contacts',
		'uses'	=>	'DashboardController@tankContacts'
	]);

	Route::get('/users/authorize',[
		'as'	=>	'users-authorize',
		'uses'	=>	'AdminController@manageUsers'
	]);

	Route::get('/users/settings',[
		'as'	=>	'users-settings',
		'uses'	=>	'AdminController@userSettings'
	]);

	Route::get('/users/{email}/authorize',[
		'as'	=>	'users-authorize-user',
		'uses'	=>	'AdminController@userAuthSettings'
	]);

	Route::get('/users/{email}/settings',[
		'as'	=>	'users-settings-user',
		'uses'	=>	'AdminController@userTankSettings'
	]);

	Route::post('/user/details',[
		'as'	=>	'users-details',
		'uses'	=>	'AccountController@getUserDetails'
	]);

	Route::post('/user/update',[
		'as'	=>	'user-update',
		'uses'	=>	'AccountController@updateUser'
	]);

	Route::post('/user/delete',[
		'as'	=>	'user-delete',
		'uses'	=>	'AccountController@deleteUser'
	]);

	Route::post('/user/verify/email',[
		'as'	=>	'user-verify-email',
		'uses'	=>	'AccountController@alreadyExist'
	]);

	Route::post('/user/search',[
		'as'	=>	'user-search',
		'uses'	=>	'AccountController@userSearch'
	]);

	Route::get('/logout', [
		'as' => 'logout',
		 'uses' => 'AccountController@logout'
	]);

	Route::post('/upload/history', [
		'as'	=>	'history-upload',
		'uses'	=>	'HistoryController@uploadHistory'
	]);

	Route::post('/delete/history',[
		'as'	=>	'history-delete',
		'uses'	=>	'HistoryController@deleteHistory'
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

	Route::post('/contacts/add', [
		'as'	=>	'contacts-add',
		'uses'	=>	'ContactController@addContact'
	]);

	Route::post('/contacts/update', [
		'as'	=>	'contacts-update',
		'uses'	=>	'ContactController@updateContact'
	]);

	Route::post('/contacts/delete', [
		'as'	=>	'contacts-delete',
		'uses'	=>	'ContactController@deleteContact'
	]);

	Route::post('/contacts/details', [
		'as'	=>	'contacts-details',
		'uses'	=>	'ContactController@getContactDetails'
	]);

	Route::post('/inspection/edit', [
		'as'	=>	'inspection-edit',
		'uses'	=>	'InspectionController@updateInspectionDetails'
	]);

	Route::post('/inspection/details', [
		'as'	=>	'inspection-details',
		'uses'	=>	'InspectionController@getInspectionDetails'
	]);

	

	Route::post('/specifications/edit', [
		'as'	=>	'specifications-edit',
		'uses'	=>	'SpecificationController@updateSpecs'
	]);

	Route::post('/specifications/details', [
		'as'	=>	'specifications-details',
		'uses'	=>	'SpecificationController@getSpecs'
	]);

	Route::post('/location/edit', [
		'as'	=>	'location-edit',
		'uses'	=>	'LocationController@updateLocation'
	]);

	Route::post('/location/details', [
		'as'	=>	'location-details',
		'uses'	=>	'LocationController@getLocationDetails'
	]);



});

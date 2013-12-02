<?php

Route::group(array('prefix' => 'laravelerator'), function()
{
	Route::get('resource/create', 'Laravelerator\Laravelerator\ResourceController@create');
	Route::post('resource/show', 'Laravelerator\Laravelerator\ResourceController@show');

	Route::get('boilerplate/create', 'Laravelerator\Laravelerator\BoilerplateController@create');
	Route::post('boilerplate/show', 'Laravelerator\Laravelerator\BoilerplateController@show');

	Route::get('ajax/path', [
		'before' => 'ajax|csrf',
		'uses' => 'Laravelerator\Laravelerator\AjaxController@path'
	]);

	Route::get('ajax/template', [
		'before' => 'ajax|csrf',
		'uses' => 'Laravelerator\Laravelerator\AjaxController@template'
	]);

	Route::get('/', 'Laravelerator\Laravelerator\PagesController@home');
});

Route::filter('ajax', function()
{
	if ( ! Request::ajax()) App::abort(404);
});
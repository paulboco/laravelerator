<?php

Route::group(array('prefix' => 'laravelerator'), function()
{
	Route::get('generate/create', 'Laravelerator\Laravelerator\GenerateController@create');
	Route::post('generate/show', 'Laravelerator\Laravelerator\GenerateController@show');

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
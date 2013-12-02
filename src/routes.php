<?php

Route::group(array('prefix' => 'alg'), function()
{
	Route::get('resource/create', 'Paulboco\Alg\ResourceController@create');
	Route::post('resource/show', 'Paulboco\Alg\ResourceController@show');

	Route::get('boilerplate/create', 'Paulboco\Alg\BoilerplateController@create');
	Route::post('boilerplate/show', 'Paulboco\Alg\BoilerplateController@show');

	Route::get('ajax/path', [
		'before' => 'ajax|csrf',
		'uses' => 'Paulboco\Alg\AjaxController@path'
	]);

	Route::get('ajax/template', [
		'before' => 'ajax|csrf',
		'uses' => 'Paulboco\Alg\AjaxController@template'
	]);

	Route::get('/', 'Paulboco\Alg\PagesController@home');
});

Route::filter('ajax', function()
{
	if ( ! Request::ajax()) App::abort(404);
});
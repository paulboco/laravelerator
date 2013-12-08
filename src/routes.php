<?php

/*
|--------------------------------------------------------------------------
| Prefix 'laravelerator'
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'laravelerator'], function()
{
	/*
	|--------------------------------------------------------------------------
	| Ajax
	|--------------------------------------------------------------------------
	*/

	Route::group(['before' => 'ajax|csrf'], function()
	{
		Route::get('ajax/path', 'Laravelerator\Laravelerator\AjaxController@path');
		Route::get('ajax/template', 'Laravelerator\Laravelerator\AjaxController@template');
	});

	/*
	|--------------------------------------------------------------------------
	| Generate
	|--------------------------------------------------------------------------
	*/

	Route::get('generate/create', 'Laravelerator\Laravelerator\GenerateController@create');
	Route::post('generate/show', 'Laravelerator\Laravelerator\GenerateController@show');

	/*
	|--------------------------------------------------------------------------
	| Home
	|--------------------------------------------------------------------------
	*/

	Route::get('/', 'Laravelerator\Laravelerator\PagesController@home');
});


/*
|--------------------------------------------------------------------------
| Ajax
|--------------------------------------------------------------------------
*/

Route::filter('ajax', function()
{
	if ( ! Request::ajax()) App::abort(404);
});
<?php

/*
|--------------------------------------------------------------------------
| Prefix 'laravelerator'
|--------------------------------------------------------------------------
*/

Route::group(
	[
		'prefix' => 'laravelerator',
		'namespace' => 'Laravelerator\Laravelerator'
	],
	function()
{
	/*
	|--------------------------------------------------------------------------
	| Generate
	|--------------------------------------------------------------------------
	*/

	Route::get('generate/create', ['as' => 'foo', 'uses' => 'GenerateController@create']);
	Route::post('generate/show', 'GenerateController@show');
	/*
	|--------------------------------------------------------------------------
	| Ajax
	|--------------------------------------------------------------------------
	*/

	Route::group(['before' => 'ajax|csrf'], function()
	{
		Route::get('ajax/template', 'AjaxController@template');
		Route::get('ajax/path', 'AjaxController@path');
	});

	/*
	|--------------------------------------------------------------------------
	| Pages
	|--------------------------------------------------------------------------
	*/

	Route::get('routes', 'PagesController@routes');
	Route::get('/', 'PagesController@home');
});


/*
|--------------------------------------------------------------------------
| Filters
|--------------------------------------------------------------------------
*/

Route::filter('ajax', function()
{
	if ( ! Request::ajax()) App::abort(404);
});
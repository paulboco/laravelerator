<?php

/*
 _       ___  ______   ___   _   _  _____  _      _____ ______   ___  _____  _____ ______
| |     / _ \ | ___ \ / _ \ | | | ||  ___|| |    |  ___|| ___ \ / _ \|_   _||  _  || ___ \
| |    / /_\ \| |_/ // /_\ \| | | || |__  | |    | |__  | |_/ // /_\ \ | |  | | | || |_/ /
| |    |  _  ||    / |  _  || | | ||  __| | |    |  __| |    / |  _  | | |  | | | ||    /
| |____| | | || |\ \ | | | |\ \_/ /| |___ | |____| |___ | |\ \ | | | | | |  \ \_/ /| |\ \
\_____/\_| |_/\_| \_|\_| |_/ \___/ \____/ \_____/\____/ \_| \_|\_| |_/ \_/   \___/ \_| \_|

*/

/*
|--------------------------------------------------------------------------
| Prefix:    laravelerator
| Namespace: Laravelerator\Laravelerator
|--------------------------------------------------------------------------
*/

Route::group(
	[
		'prefix' => 'laravelerator',
		'namespace' => 'Laravelerator\Laravelerator'
	],
	function()
{

	/////////////////////////////////
	// states for ui-router
	////////////////////////////////

	Route::get('states', 'AngularController@states');




	/*
	|--------------------------------------------------------------------------
	| Assets
	|--------------------------------------------------------------------------
	*/

	Route::get('assets/{type}', 'AssetsController@fetch');

	/*
	|--------------------------------------------------------------------------
	| Generate
	|--------------------------------------------------------------------------
	*/

    Route::get('generate', 'AngularController@generateCreate');
    Route::post('generate', 'AngularController@generateStore');
	// Route::get('generate/create', ['as' => 'foo', 'uses' => 'GenerateController@create']);
	// Route::post('generate/show', 'GenerateController@show');

	/*
	|--------------------------------------------------------------------------
	| Ajax
	|--------------------------------------------------------------------------
	*/

	Route::group(['before' => 'csrf|isJson'], function()
	{
		Route::get('ajax/templatesavailable', 'AjaxController@templatesAvailable');
		Route::get('ajax/path', 'AjaxController@path');
	});

	/*
	|--------------------------------------------------------------------------
	| Pages
	|--------------------------------------------------------------------------
	*/

    Route::get('/', 'AngularController@spa');
    Route::get('home', 'AngularController@home');
    Route::get('routes', 'AngularController@routes');
	// Route::get('routes', 'PagesController@routes');
	// Route::get('/', 'PagesController@home');
});


/*
|--------------------------------------------------------------------------
| Filters
|--------------------------------------------------------------------------
*/

Route::filter('isAjax', function()
{
	if ( ! Request::ajax()) die('is not ajax');
	if ( ! Request::ajax()) App::abort(404);
});

Route::filter('isJson', function()
{
	if ( ! Request::json()) die('is not json');
	if ( ! Request::json()) App::abort(404);
});

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

	/*
	|--------------------------------------------------------------------------
	| Assets
	|--------------------------------------------------------------------------
	*/

	Route::get('assets/{type}', 'AssetsController@fetch');

	/*
	|--------------------------------------------------------------------------
	| Ajax
	|--------------------------------------------------------------------------
	*/

	Route::group(['before' => 'isJson'], function()
	{
		Route::get('ajax/templates', 'AjaxController@templates');
		Route::get('ajax/path', 'AjaxController@path');
		Route::get('ajax/routes', 'AjaxController@routes');
	});

	/*
	|--------------------------------------------------------------------------
	| Angular
	|--------------------------------------------------------------------------
	*/

    Route::get('generate', 'AngularController@generateCreate');
    Route::post('generate', 'AngularController@generateStore');
    Route::get('routes', 'AngularController@routes');
    Route::get('home', 'AngularController@home');
    Route::get('/', 'AngularController@spa');
});

/*
|--------------------------------------------------------------------------
| Filters
|--------------------------------------------------------------------------
*/

Route::filter('isJson', function()
{
	// if ( ! Request::json()) die('is not json');
	if ( ! Request::json()) App::abort(404);
});

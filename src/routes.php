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
		'namespace' => 'Laravelerator\Laravelerator',
		'domain' => 'laravel-alg.dev'
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

	//TODO: Add CSRF token when finished testing
	Route::group(['before' => 'csrf'], function()
	{
		Route::get('ajax/templatesavailable', ['before' => 'json', 'uses' => 'AjaxController@templatesAvailable']);
		Route::get('ajax/path', ['before' => 'ajax', 'uses' => 'AjaxController@path']);
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
	if ( ! Request::ajax()) die('is not ajax');
	if ( ! Request::ajax()) App::abort(404);
});

Route::filter('json', function()
{
	if ( ! Request::json()) die('is not json');
	if ( ! Request::json()) App::abort(404);
});
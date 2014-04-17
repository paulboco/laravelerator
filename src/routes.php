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
		// 'domain' => 'laravel-alg.dev'
	],
	function()
{
	/*
	|--------------------------------------------------------------------------
	| Generate
	|--------------------------------------------------------------------------
	*/

	Route::get('generate/from/form', ['as' => 'generate.from.form', 'uses' => 'GenerateController@fromForm']);
	Route::get('generate/from/table', ['as' => 'generate.from.table', 'uses' => 'GenerateController@fromTable']);
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
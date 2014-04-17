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

Route::group([
		'prefix' => 'laravelerator',
		'namespace' => 'Laravelerator\Laravelerator',
		// 'domain' => 'laravel-alg.dev'
	],
	function() {

	/*
	|--------------------------------------------------------------------------
	| Generate
	|--------------------------------------------------------------------------
	*/

	Route::get('generate/from/form', [
		'as' => 'laravelerator.generate.from.form',
		'uses' => 'GenerateController@fromForm'
	]);

	Route::get('generate/from/table', [
		'as' => 'laravelerator.generate.from.table',
		'uses' => 'GenerateController@fromTable'
	]);

	Route::post('generate/show', [
		'as' => 'laravelerator.generate.show',
		'uses' => 'GenerateController@show'
	]);

	/*
	|--------------------------------------------------------------------------
	| Ajax
	|--------------------------------------------------------------------------
	*/

	Route::group(['before' => 'ajax|csrf'], function()
	{
		Route::get('ajax/template', [
			'as' => 'laravelerator.ajax.template',
			'uses' => 'AjaxController@template'
		]);

		Route::get('ajax/path', [
			'as' => 'laravelerator.ajax.path',
			'uses' => 'AjaxController@path'
		]);
	});

	/*
	|--------------------------------------------------------------------------
	| Pages
	|--------------------------------------------------------------------------
	*/

	Route::get('routes', [
		'as' => 'laravelerator.routes',
		'uses' => 'PagesController@routes'
	]);

	Route::get('/', [
		'as' => 'laravelerator.home',
		'uses' => 'PagesController@home'
	]);
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
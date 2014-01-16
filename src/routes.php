<?php

/*
 _       ___  ______   ___   _   _  _____  _      _____ ______   ___  _____  _____ ______
| |     / _ \ | ___ \ / _ \ | | | ||  ___|| |    |  ___|| ___ \ / _ \|_   _||  _  || ___ \
| |    / /_\ \| |_/ // /_\ \| | | || |__  | |    | |__  | |_/ // /_\ \ | |  | | | || |_/ /
| |    |  _  ||    / |  _  || | | ||  __| | |    |  __| |    / |  _  | | |  | | | ||    /
| |____| | | || |\ \ | | | |\ \_/ /| |___ | |____| |___ | |\ \ | | | | | |  \ \_/ /| |\ \
\_____/\_| |_/\_| \_|\_| |_/ \___/ \____/ \_____/\____/ \_| \_|\_| |_/ \_/   \___/ \_| \_|

*/

Route::get('dummy', function() { return 'dummy index'; });
Route::get('dummy/create', function() { return 'dummy create'; });
Route::post('dummy', function() { return 'dummy store'; });
Route::get('dummy/id', function() { return 'dummy show'; });
Route::get('dummy/id/edit', function() { return 'dummy edit'; });
Route::put('dummy/id', function() { return 'dummy update'; });
Route::delete('dummy/id', function() { return 'dummy destroy'; });


/*
|--------------------------------------------------------------------------
| Prefix:    laravelerator
| Namespace: Laravelerator\Laravelerator
|--------------------------------------------------------------------------
*/

Route::group(
    ['prefix' => 'laravelerator', 'namespace' => 'Laravelerator\Laravelerator'],
	function() {

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

	Route::group(['prefix' => 'ajax', 'before' => 'isJson'], function()
	{
        Route::get('template', 'AjaxController@templateIndex');
        Route::get('template/{basename}', 'AjaxController@templateShow');
		Route::get('path', 'AjaxController@path');
        Route::get('routes', 'AjaxController@routes');
        Route::get('generate/create', 'AjaxController@generateCreate');
	});

	/*
	|--------------------------------------------------------------------------
	| Angular
	|--------------------------------------------------------------------------
	*/

    Route::get('schema-notation', 'AngularController@schemaNotation');
    Route::get('template-description', 'AngularController@templateDescription');
    Route::get('generate/create', 'AngularController@generateCreate');
    Route::get('generate/store', 'AngularController@generateStore');
    Route::get('routes', 'AngularController@routes');
    Route::get('home', 'AngularController@home');
    Route::get('nav', 'AngularController@nav');
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

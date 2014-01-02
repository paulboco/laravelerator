<?php namespace Laravelerator\Laravelerator;

use View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;
use Symfony\Component\Finder\Finder;
use Laravelerator\Laravelerator\Services\Validation\CustomValidators;

use Laravelerator\Alg\TemplateManager;

class LaraveleratorServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('laravelerator/laravelerator');

		$this->customValidators();

		include __DIR__.'/../../routes.php';
		include __DIR__.'/../../helpers.php';
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
	}

	/**
	 * Register Custom Validators
	 *
	 * @return void
	 */
	protected function customValidators()
	{
		$this->app['validator']->resolver(function($translator, $data, $rules, $messages)
		{
			return new CustomValidators($translator, $data, $rules, $messages);
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}


}
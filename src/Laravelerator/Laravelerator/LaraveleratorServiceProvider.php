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

		// $this->aliasFacades();
		$this->customValidators();
		$this->viewComposers();
		// $this->storeCommandName();

		include __DIR__.'/../../routes.php';
		include __DIR__.'/../../macros.php';
		include __DIR__.'/../../helpers.php';
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		// $this->registerClasses();
		// $this->registerCommands();
	}

	/**
	 * Register class dependecies
	 *
	 * @return void
	 */
	// protected function registerClasses()
	// {
	// 	// TemplateManager
	// 	$this->app['alg.templatemanager'] = $this->app->share(function($app)
	// 	{
	// 		return new TemplateManager(new Finder);
	// 	});

	// 	// SchemaParser
	// 	$this->app['alg.schemaparser'] = $this->app->share(function($app)
	// 	{
	// 		return new SchemaParser;
	// 	});

	// 	// Tokenizer
	// 	$this->app['alg.tokenizer'] = $this->app->share(function($app)
	// 	{
	// 		return new Tokenizer($app['alg.schemaparser']);
	// 	});

	// 	// ManifestCreator
	// 	$this->app['alg.manifestcreator'] = $this->app->share(function($app)
	// 	{
	// 		return new ManifestCreator($app['alg.tokenizer'], $app['alg.templatemanager']);
	// 	});
	// }

	/**
	 * Register Commands
	 *
	 * @return void
	 */
	// protected function registerCommands()
	// {
	// 	$this->app['alg.console.resource'] = $this->app->share(function($app)
	// 	{
	// 		return new Console\ResourceCommand($app['alg.templatemanager'], $app['alg.manifestcreator']);
	// 	});

	// 	$this->commands('alg.console.resource');
	// }

	/**
	 * Add Facade Aliases
	 *
	 * @return void
	 */
	// protected function aliasFacades()
	// {
	// 	$loader = AliasLoader::getInstance();

	// 	$loader->alias('Laravelerator\Alg\Manifest', 'Laravelerator\Alg\Facades\Manifest');
	// 	$loader->alias('Laravelerator\Alg\Template', 'Laravelerator\Alg\Facades\Template');
	// 	$loader->alias('Laravelerator\Alg\Token', 'Laravelerator\Alg\Facades\Token');
	// 	$loader->alias('Laravelerator\Alg\Schema', 'Laravelerator\Alg\Facades\Schema');
	// }

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
	 * Define View Composers
	 *
	 * @return void
	 */
	protected function viewComposers()
	{
		View::composer(
			'laravelerator::controllers.ajax.write_path_display',
			'Laravelerator\Laravelerator\Composers\WritePathDisplayComposer'
		);

		View::composer(
			'laravelerator::controllers._shared.schema_notation',
			'Laravelerator\Laravelerator\Composers\SchemaNotationComposer'
		);
	}

	// protected function storeCommandName()
	// {
	// 	if ($this->app->runningInConsole())
	// 	{
	// 		if (count($_SERVER['argv']) > 1)
	// 		{
	// 			if (substr($_SERVER['argv'][1], 0, 4) == 'alg:')
	// 			{
	// 				$command = substr($_SERVER['argv'][1], 4);
	// 				$this->app->session->put('alg.command.name', $command);
	// 			}
	// 		}
	// 	}
	// 	elseif ( ! $this->app->request->ajax())
	// 	{
	// 		$command = $this->app->request->segment(2);

	// 		$this->app->session->put('alg.command.name', $command);
	// 	}
	// }

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
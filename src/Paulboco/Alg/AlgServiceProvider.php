<?php namespace Paulboco\Alg;

use View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;
use Symfony\Component\Finder\Finder;
use Paulboco\Alg\Services\Validation\CustomValidators;

class AlgServiceProvider extends ServiceProvider {

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
		$this->package('paulboco/alg');

		$this->aliasFacades();
		$this->customValidators();
		$this->viewComposers();
		$this->storeCommandName();

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
		$this->registerClasses();
		$this->registerCommands();
	}

	/**
	 * Register class dependecies
	 *
	 * @return void
	 */
	protected function registerClasses()
	{
		// TemplateManager
		$this->app['alg.templatemanager'] = $this->app->share(function($app)
		{
			return new TemplateManager(new Finder);
		});

		// SchemaParser (Yes, SchemaParser)
		$this->app['alg.schemaparser'] = $this->app->share(function($app)
		{
			return new SchemaParser;
		});

		// Tokenizer
		$this->app['alg.tokenizer'] = $this->app->share(function($app)
		{
			return new Tokenizer($app['alg.schemaparser']);
		});

		// ManifestCreator
		$this->app['alg.manifestcreator'] = $this->app->share(function($app)
		{
			return new ManifestCreator($app['alg.tokenizer'], $app['alg.templatemanager']);
		});
	}

	/**
	 * Register Commands
	 *
	 * @return void
	 */
	protected function registerCommands()
	{
		$this->app['alg.console.resource'] = $this->app->share(function($app)
		{
			return new Console\ResourceCommand($app['alg.templatemanager'], $app['alg.manifestcreator']);
		});

		$this->commands('alg.console.resource');
	}

	/**
	 * Add Facade Aliases
	 *
	 * @return void
	 */
	protected function aliasFacades()
	{
		$loader = AliasLoader::getInstance();

		$loader->alias('Paulboco\Alg\Manifest', 'Paulboco\Alg\Facades\Manifest');
		$loader->alias('Paulboco\Alg\Template', 'Paulboco\Alg\Facades\Template');
		$loader->alias('Paulboco\Alg\Token', 'Paulboco\Alg\Facades\Token');
		$loader->alias('Paulboco\Alg\Schema', 'Paulboco\Alg\Facades\Schema');
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
	 * Define View Composers
	 *
	 * @return void
	 */
	protected function viewComposers()
	{
		View::composer(
			'alg::partials.write_path_display',
			'Paulboco\Alg\Composers\WritePathDisplayComposer'
		);

		View::composer(
			'alg::partials.schema_notation',
			'Paulboco\Alg\Composers\SchemaNotationComposer'
		);
	}

	protected function storeCommandName()
	{
		if ($this->app->runningInConsole())
		{
			if (count($_SERVER['argv']) > 1)
			{
				if (substr($_SERVER['argv'][1], 0, 4) == 'alg:')
				{
					$command = substr($_SERVER['argv'][1], 4);
					$this->app->session->put('alg.command.name', $command);
				}
			}
		}
		elseif ( ! $this->app->request->ajax())
		{
			$command = $this->app->request->segment(2);

			$this->app->session->put('alg.command.name', $command);
		}
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
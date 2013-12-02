<?php namespace Paulboco\Alg\Console;

use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Paulboco\Alg\Manifest;
use Paulboco\Alg\Template;

class ResourceCommand extends BaseCommand {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'alg:resource';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Generate a resource for a database table.';

	protected $table;
	protected $namespace;
	protected $fields;
	protected $mock;
	protected $path;


	/**
	 * Execute the console command.
	 *
	 * @return void
	 */
	public function fire()
	{
		if ($input = $this->getConsoleInput())
		{
			$this->generate($input);
		}

		$this->comment('Done');
	}

	/**
	 * Get input from the console.
	 *
	 * @return array|null
	 */
	protected function getConsoleInput()
	{
		$this->mock = $this->option('mock');

		if (($path = $this->getWritePath()) === false)
		{
			return;
		}

		if ($template = $this->getTemplate())
		{
			return [
				'template' => $template,
				'table' => $this->argument('table'),
				'namespace' => $this->argument('namespace'),
				'schema' => $this->option('schema'),
				'path' => $path,
			];
		}
	}

	/**
	 * Attempt to generate the files.
	 *
	 * @param  array  $input
	 * @return void
	 */
	protected function generate($input)
	{
		if (Manifest::wasCreated($input))
		{
			$this->createDirectories();

			$this->createFiles();
		}
		else
		{
			$this->error(Manifest::getErrors());
		}
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			array('template', InputArgument::REQUIRED, 'The template name.'),
			array('table', InputArgument::REQUIRED, 'The table name (plural).'),
			array('namespace', InputArgument::REQUIRED, 'The namespace.'),
		);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array(
			array('schema', 's', InputOption::VALUE_OPTIONAL, 'The table schema. e.g. name:string:option', ''),
			array('path', 'p', InputOption::VALUE_OPTIONAL, 'The write path for generated files.', ''),
			array('mock', 'm', InputOption::VALUE_NONE, 'File writing is disabled.'),
		);
	}

}
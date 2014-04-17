<?php namespace Laravelerator\Laravelerator;

use Win\DbUtil;
use Input;
use Redirect;
use View;
use Laravelerator\Alg\Manifest;
use Laravelerator\Alg\Template;
use Laravelerator\Laravelerator\Services\Validation\GenerateValidator;

class GenerateController extends BaseController {

	protected $validator;


	public function __construct(GenerateValidator $validator)
	{
		$this->validator = $validator;
	}

	public function fromForm()
	{
		// Set testing defaults here
		$template = Input::old('template', 'scaffold');
		$table = Input::old('table', 'problems');
		$namespace = Input::old('namespace', 'Shiphed');
		$schema = Input::old('schema', "id : increments\nusername : string(100)\npassword : string(100)\n");
		$path = Input::old('path', 'app');
		$mock = Input::old('mock', '');

		$templatesAvailable = Template::getAvailable();

		return View::make('laravelerator::controllers.generate.from_form', get_defined_vars());
	}

	public function fromTable($selectedDatabase = null, $selectedTable = null)
	{
		foreach (DbUtil::showDatabases() as $database)
		{
			$databases[$database] = DbUtil::showTables($database);
		}

		$databases = array_except($databases, ['test', 'information_schema', 'performance_schema', 'phpmyadmin', 'mysql']);

		if ($selectedDatabase and $selectedTable)
		{
$schema = DbUtil::schema($selectedDatabase, $selectedTable);
// dd($schema);
		}

		return View::make('laravelerator::controllers.generate.from_table', compact('databases', 'selectedDatabase', 'selectedTable', 'schema'));
	}

	/**
	 * Show the generator results.
	 */
	public function show()
	{
		$input = Input::all();

		if ($this->validator->fails($input))
		{
			return Redirect::action('Laravelerator\Laravelerator\GenerateController@fromForm')
				->withInput()
				->withErrors($this->validator->errors());
		}

		if (Manifest::wasCreated(Input::except('_token')))
		{
			$compiledCommand = compile_command();
			$directories = Manifest::getDirectories();
			$files = Manifest::getFiles();
		}
		else
		{
			$overwrites = Manifest::getOverwrites();
		}

		return View::make('laravelerator::controllers.generate.show', get_defined_vars());
	}


}
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
		$template = Input::get('template', Input::old('template', 'shiphed'));
		$table = Input::get('table', Input::old('table', 'problems'));
		$namespace = Input::get('namespace', Input::old('namespace', 'Shiphed'));
		$schema = Input::get('schema', Input::old('schema', "id : increments\nusername : string(100)\npassword : string(100)\n"));
		$path = Input::get('path', Input::old('path', 'app'));
		$mock = Input::get('mock', Input::old('mock', '1'));

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

			foreach ($schema as $schemata)
			{
				$schemaString[] = $schemata['Field'] . ':' . $schemata['Type'];
			}

			$schemaString = implode($schemaString, ",\n");
		}

		return View::make('laravelerator::controllers.generate.from_table', compact('databases', 'selectedDatabase', 'selectedTable', 'schema', 'schemaString'));
	}

	/**
	 * Show the generator results.
	 */
	public function show()
	{
		$input = Input::all();
// dv($input);die;
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
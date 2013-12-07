<?php namespace Laravelerator\Laravelerator;

use Input;
use View;
use Redirect;
use Laravelerator\Alg\Manifest;
use Laravelerator\Alg\Template;
use Laravelerator\Laravelerator\Services\Validation\GenerateValidator;

class GenerateController extends BaseController {

	protected $validator;


	public function __construct(GenerateValidator $validator)
	{
		$this->validator = $validator;

		View::share('subTitle', ':generate');
	}

	public function create()
	{
		// Set testing defaults here
		$template = Input::old('template', 'crud');
		$table = Input::old('table', 'problems');
		$namespace = Input::old('namespace', 'Shiphed');
		$schema = Input::old('schema', '');
		$path = Input::old('path', 'app');
		$mock = Input::old('mock', 'mock');

		$templatesAvailable = Template::getAvailable();

		return View::make('laravelerator::controllers.generate.create', get_defined_vars());
	}

	/**
	 * Show the generator results.
	 */
	public function show()
	{
		$input = Input::all();

		if ($this->validator->fails($input))
		{
			return Redirect::action('Laravelerator\Laravelerator\GenerateController@create')
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

		return View::make('laravelerator::controllers._shared.show', get_defined_vars());
	}


}
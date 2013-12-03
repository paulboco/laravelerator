<?php namespace Laravelerator\Laravelerator;

use Input;
use View;
use Redirect;
use Laravelerator\Alg\Manifest;
use Laravelerator\Alg\Template;
use Laravelerator\Laravelerator\Services\Validation\ResourceValidator;

class ResourceController extends BaseController {

	protected $validator;


	public function __construct(ResourceValidator $validator)
	{
		$this->validator = $validator;

		View::share('subTitle', ':resource');
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

		return View::make('laravelerator::controllers.resource.create', get_defined_vars());
	}

	/**
	 * Show the generator results.
	 */
	public function show()
	{
		if ($this->validator->fails())
		{
			return Redirect::action('Laravelerator\Laravelerator\ResourceController@create')
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

		return View::make('laravelerator::controllers.resource.show', get_defined_vars());
	}


}
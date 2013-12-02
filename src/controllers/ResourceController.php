<?php namespace Paulboco\Alg;

use Input;
use View;
use Redirect;
use Paulboco\Alg\Services\Validation\ResourceValidator;

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

		return View::make('alg::resource.create', get_defined_vars());
	}

	/**
	 * Show the generator results.
	 */
	public function show()
	{
		if ($this->validator->fails())
		{
			return Redirect::action('Paulboco\Alg\ResourceController@create')
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

		return View::make('alg::resource.show', get_defined_vars());
	}


}
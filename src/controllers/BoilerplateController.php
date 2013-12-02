<?php namespace Paulboco\Alg;

use Input;
use View;
use Redirect;
use Paulboco\Alg\Services\Validation\BoilerplateValidator;

class BoilerplateController extends BaseController {

	protected $validator;


	public function __construct(BoilerplateValidator $validator)
	{
		$this->validator = $validator;

		View::share('subTitle', ':boilerplate');
	}

	public function create()
	{
		// Set testing defaults here
		$template = Input::old('template', 'crud');
		$namespace = Input::old('namespace', 'Shiphed');
		$mock = Input::old('mock', 'mock');

		$templatesAvailable = Template::getAvailable();

		return View::make('laravelerator::boilerplate.create', get_defined_vars());
	}

	/**
	 * Show the generator results.
	 */
	public function show()
	{
		if ($this->validator->fails())
		{
			return Redirect::action('Paulboco\Alg\BoilerplateController@create')
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

		return View::make('laravelerator::boilerplate.show', get_defined_vars());
	}


}
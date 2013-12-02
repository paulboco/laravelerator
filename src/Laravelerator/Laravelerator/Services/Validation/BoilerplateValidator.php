<?php namespace Paulboco\Alg\Services\Validation;

use Input;

class BoilerplateValidator extends Validator {

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public static $rules = [
		// 'namespace' => 'required',
		// 'schema' => 'required',
		'template' => 'required|template_exists|has_templates',
		// 'path' => 'path_exists|path_inside_root',
	];

	public static $messages = [
		// 'path_exists' => "The directory ':path' does not exist.",
		// 'path_inside_root' => 'The write path must be inside the project root',
		'template_exists' => "Could not load the selected template.",
		'has_templates' => "The template ':path' is empty.",
	];


}
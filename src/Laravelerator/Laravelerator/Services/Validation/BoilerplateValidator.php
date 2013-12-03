<?php namespace Laravelerator\Laravelerator\Services\Validation;

use Input;

class BoilerplateValidator extends Validator {

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public static $rules = [
		'template' => 'required|template_exists|has_templates',
		// 'path' => 'path_exists|path_inside_root',
		// 'namespace' => 'required',
		// 'schema' => 'required',
	];

	public static $messages = [
		'template_exists' => "Could not load the selected template.",
		'has_templates' => "The template ':path' is empty.",
		// 'path_exists' => "The directory ':path' does not exist.",
		// 'path_inside_root' => 'The write path must be inside the project root',
	];


}
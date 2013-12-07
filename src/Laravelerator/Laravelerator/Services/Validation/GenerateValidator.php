<?php namespace Laravelerator\Laravelerator\Services\Validation;

use Input;

class GenerateValidator extends Validator {

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public static $rules = [
		'template' => 'required|template_exists|has_templates',
		'table' => 'required',
		'namespace' => 'required',
		'path' => 'path_exists|path_inside_root',
		// 'schema' => 'required',
	];

	public static $messages = [
		'template_exists' => "Could not load the selected template.",
		'has_templates' => "The template ':path' is empty.",
		'path_exists' => "The directory ':path' does not exist.",
		'path_inside_root' => 'The write path must be inside the project root',
	];


}
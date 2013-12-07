<?php namespace Laravelerator\Laravelerator\Services\Validation;

use App;
use Illuminate\Validation\Validator as V;
use Laravelerator\Alg\Template;

class CustomValidators extends V {

	/**
	 * Validate the write path exists.
	 *
	 * @param  string  $attribute
	 * @param  string  $value
	 * @param  array   $parameters
	 * @return bool
	 */
	public function validatePathExists($attribute, $value, $parameters)
	{
		$path = Template::getWritePath($value);

		return is_dir($path);
	}

	/**
	 * Validate the write path is in the project project directory.
	 *
	 * @param  string  $attribute
	 * @param  string  $value
	 * @param  array   $parameters
	 * @return bool
	 */
	public function validatePathInsideRoot($attribute, $value, $parameters)
	{
		$path = Template::getWritePath($value);

		return str_contains(realpath($path), base_path());
	}

	/**
	 * Validate a template exists.
	 *
	 * @param  string  $attribute
	 * @param  string  $value
	 * @param  array   $parameters
	 * @return bool
	 */
	public function validateTemplateExists($attribute, $value, $parameters)
	{
		$path = Template::getTemplatePath($value);

		return is_dir($path);
	}

	/**
	 * Validate a template contains files.
	 *
	 * @param  string  $attribute
	 * @param  string  $value
	 * @param  array   $parameters
	 * @return bool
	 */
	public function validateHasTemplates($attribute, $value, $parameters)
	{
		$path = Template::getTemplatePath($value);

		if (is_dir($path))
		{
			return (count(scandir($path)) != 2);
		}
	}

	/**
	 * Define replacement for path_exists validator.
	 *
	 * @param  string  $message
	 * @param  string  $attribute
	 * @param  string  $rule
	 * @param  array   $parameters
	 * @return string
	 */
	protected function replacePathExists($message, $attribute, $rule, $parameters)
	{
		$path = $this->getData()['path'];
		$path = Template::getWritePath($path);

		return str_replace(':path', $path, $message);
	}

	/**
	 * Define replacement for has_templates validator.
	 *
	 * @param  string  $message
	 * @param  string  $attribute
	 * @param  string  $rule
	 * @param  array   $parameters
	 * @return string
	 */
	protected function replaceHasTemplates($message, $attribute, $rule, $parameters)
	{
		$template = $this->getData()['template'];
		$path = Template::getTemplatePath($template);

		return str_replace(':path', $path, $message);
	}


}
<?php namespace Laravelerator\Laravelerator\Services\Validation;

use Input;
use Validator as V;

abstract class Validator {

	protected $errors;


	public function __construct()
	{
		static::$messages = isset(static::$messages) ? static::$messages : [];
	}

	/**
	 * Check that input passes validation.
	 *
	 * @param  array  $input
	 * @return bool
	 * @TODO   explicitly pass input.
	 */
	public function passes($input)
	{
		$validator = V::make($input, static::$rules, static::$messages);

		if ($validator->fails())
		{
			$this->errors = $validator->messages();

			return false;
		}

		return true;
	}

	public function fails($input)
	{
		return ! $this->passes($input);
	}

	/**
	 * Accessor for errors.
	 *
	 * @return Illuminate\Support\MessageBag
	 */
	public function errors()
	{
		return $this->errors;
	}
}
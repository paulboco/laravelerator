<?php

use Laravelerator\Alg\Schema;

if ( ! function_exists('mute_base_path'))
{
	/**
	 * Mute the appearance of the project path in a string.
	 *
	 * @param  string  $string
	 * @param  bool    $strip
	 * @return string
	 */
	function mute_base_path($string, $strip = false)
	{
		$base = base_path() . '/';

		$replace = $strip ? '' : '<span class="mute-path">' . $base . '</span>';

		return str_replace($base, $replace, $string);
	}
}

if ( ! function_exists('compile_command'))
{
	/**
	 * Compile the command to a string.
	 *
	 * @return string
	 */
	function compile_command()
	{
		$arguments = Input::only(['template', 'table', 'namespace']);
		$options = Input::only(['schema', 'path']);

		$command = 'php artisan alg:' . Request::segment(2) . ' ';

		$command .= implode(' ', array_filter($arguments));

		foreach ($options as $option => $value)
		{
			if ($option == 'schema')
			{
				$value = Schema::formatInput($value);
			}

			if ($value)
			{
				$command .= ' --' . $option . '="' . $value . '"';
			}
		}

		if (Input::get('mock'))
		{
			$command .= ' --mock';
		}

		return $command;
	}


}
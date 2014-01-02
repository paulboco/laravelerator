<?php

use Laravelerator\Alg\Schema;
use Laravelerator\Alg\Template;

if ( ! function_exists('get_routes'))
{
	/**
	 * Get an array of all registered routes.
	 *
	 * @return string
	 */
	function get_routes()
	{
        $router = App::make('router')->getRoutes()->getRoutes();

        foreach ($router as $key => $route)
        {
            $routes[$key] = [
                'domain' => $route->domain(),
                'verb' => $route->methods()[0],
                'uri' => $route->getUri(),
                'name' => $route->getName(),
                'action' => $route->getActionName(),
                'before' => implode(', ', array_keys($route->beforeFilters())),
                'after' => implode(', ', array_keys($route->afterFilters())),
            ];
        }

        return $routes;
	}
}

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

		$replace = $strip ? '' : '<span class="mute-basepath">' . $base . '</span>';

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

if ( ! function_exists('path_exists'))
{
    /**
     * Test is a file exists
     *
     * @param  string  $relativePath
     * @return string
     */
    function path_exists($relativePath)
    {
        $requestedPath = Template::getWritePath($relativePath);

        if (is_dir($requestedPath))
        {
            $realpath = realpath($requestedPath);

            if (str_contains($realpath, base_path()))
            {
                $msg = $realpath == base_path() ? ' (project root)' : '';
            }
            else
            {
                $class = 'has-error';
                $msg = 'Error! You may not write outside the project root.';
            }
        }
        else
        {
            $class = 'has-error';
            $realpath = 'Path not found';
        }

        return compact('relative', 'realpath', 'class', 'msg');
    }
}
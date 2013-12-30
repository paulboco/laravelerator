<?php namespace Laravelerator\Laravelerator;

use Input;
use Response;
use Laravelerator\Alg\Template;

class AjaxController extends BaseController {

    /**
     * Ajax request for available templates
     */
    public function templates()
    {
        return Template::getAvailable();
    }

    /**
     * Ajax request for write path display
     */
    public function path()
    {
        $relative = Input::get('path');
        $requestedPath = Template::getWritePath($relative);

        if (is_dir($requestedPath))
        {
            $realpath = realpath($requestedPath);

            if (str_contains($realpath, base_path()))
            {
                $class = 'path-found';
                $msg = $realpath == base_path() ? ' (project root)' : '';
                $msg = '';
            }
            else
            {
                $class = 'path-not-found';
                $msg = 'Error! You may not write outside the project root.';
            }
        }
        else
        {
            $realpath = 'Path not found';
            $class = 'path-not-found';
            $msg = '';
        }

        return compact('relative', 'realpath', 'class', 'msg');
    }

    /**
     * Ajax request for registered routes
     */
    public function routes()
    {
        return get_routes();
    }
}
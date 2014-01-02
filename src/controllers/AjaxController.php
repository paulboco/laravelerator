<?php namespace Laravelerator\Laravelerator;

use Controller;
use Input;
use Response;
use Laravelerator\Alg\Template;

class AjaxController extends Controller {

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
        $relativePath = Input::get('path');

        return path_exists($relativePath);
    }

    /**
     * Ajax request for registered routes
     */
    public function routes()
    {
        return get_routes();
    }
}


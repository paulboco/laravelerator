<?php namespace Laravelerator\Laravelerator;

use Input;
use Request;
use Session;
use View;
use Laravelerator\Alg\Template;

class AjaxController extends BaseController {

    /**
     * Ajax request for write path display
     */
    public function path()
    {
        return View::make('laravelerator::controllers.ajax.write_path_display');
    }

    /**
     * Ajax request for available templates
     */
    public function templatesAvailable()
    {
        return Template::getAvailable();
    }


}
<?php namespace Laravelerator\Laravelerator;

use Controller;
use Input;
use Response;
use Laravelerator\Alg\Template;
use Laravelerator\Laravelerator\Services\Validation\GenerateValidator;

class AjaxController extends Controller {

    protected $validator;


    public function __construct(GenerateValidator $validator)
    {
        $this->validator = $validator;
    }

    /**
     * Get available templates
     */
    public function template()
    {
        return Template::getAvailable();
    }

    /**
     * Get write path display
     */
    public function path()
    {
        $relativePath = Input::get('path');

        return path_exists($relativePath);
    }

    /**
     * Get registered routes
     */
    public function routes()
    {
        return get_routes();
    }

    /**
     * Validate generate form
     */
    public function generateCreate()
    {
        $input = Input::all();
return $input;
        if ($this->validator->fails($input))
        {
            // return failed response
        }

        // return an ok to display generated files
    }


}


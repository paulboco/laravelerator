<?php namespace Laravelerator\Laravelerator;

use Controller;
use Input;
use View;
use Request;

class AngularController extends Controller {

    /**
     * Single Page App view
     */
    public function spa()
    {
        return View::make('laravelerator::spa');
    }

    /**
     * Navbar partial
     */
    public function nav()
    {
        return View::make('laravelerator::nav');
    }

    /**
     * Home page
     */
    public function home()
    {
        return View::make('laravelerator::pages.home');
    }

    /**
     * Generate create
     */
    public function generateCreate()
    {
        return View::make('laravelerator::pages.generate.create');
    }

    /**
     * Generate store
     */
    public function generateStore()
    {
//         $input = Request::query();
// dd($input);
        return View::make('laravelerator::pages.generate.show');
    }

    /**
     * Template description partial
     */
    public function templateDescription()
    {
        return View::make('laravelerator::pages.generate.partials.template_description');
    }

    /**
     * Schema notation partial
     */
    public function schemaNotation()
    {
        return View::make('laravelerator::pages.generate.partials.schema_notation');
    }

    /**
     * Routes page
     */
    public function routes()
    {
        return View::make('laravelerator::pages.routes');
    }


}
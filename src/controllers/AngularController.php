<?php namespace Laravelerator\Laravelerator;

use Input;
use View;

class AngularController extends BaseController {

    /**
     * Single Page App view
     */
    public function spa()
    {
        return View::make('laravelerator::angular.spa');
    }

    /**
     * Home page
     */
    public function home()
    {
        return View::make('laravelerator::controllers.pages.home');
    }

    /**
     * Generate create
     */
    public function generateCreate()
    {
        return View::make('laravelerator::controllers.generate.create');
    }

    /**
     * Generate store
     */
    public function generateStore()
    {
        $input = Input::all();
dd($input);
        return $input;
    }

    /**
     * Routes page
     */
    public function routes()
    {
        return View::make('laravelerator::controllers.pages.routes');
    }


}
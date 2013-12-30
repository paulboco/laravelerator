<?php namespace Laravelerator\Laravelerator;

use App;
use View;

class AngularController extends BaseController {

    /**
     * Master page
     */
    public function spa()
    {
        return View::make('laravelerator::angular-states-master');
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
        return View::make('laravelerator::controllers.generate.store');
    }

    /**
     * Routes page
     */
    public function routes()
    {
        return View::make('laravelerator::controllers.pages.routes');
    }


}
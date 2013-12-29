<?php namespace Laravelerator\Laravelerator;

use App;
use View;

class AngularController extends BaseController {

    public function states()
    {
        return View::make('laravelerator::angular-states-master');
    }

    public function spa()
    {
        return View::make('laravelerator::angular-master');
    }

    public function home()
    {
        sleep(1);

        return View::make('laravelerator::controllers.pages.home');
    }

    public function generateCreate()
    {
        return View::make('laravelerator::controllers.generate.create');
    }

    public function generateStore()
    {
        return View::make('laravelerator::controllers.generate.store');
    }

    public function routes()
    {
        sleep(2);

        $router = App::make('router')->getRoutes()->getRoutes();

        foreach ($router as $key => $route)
        {
            $routes[$key] = [
                'domain' => $route->domain(),
                'uri' => $route->methods()[0] . ' ' . $route->getUri(),
                'name' => $route->getName(),
                'action' => $route->getActionName(),
                'before' => implode(', ', array_keys($route->beforeFilters())),
                'after' => implode(', ', array_keys($route->afterFilters())),
            ];
        }

        return View::make('laravelerator::controllers.pages.routes', compact('routes'));
    }


}
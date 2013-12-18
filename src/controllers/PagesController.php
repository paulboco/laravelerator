<?php namespace Laravelerator\Laravelerator;

use App;
use Route;
use View;
use Controller;

class PagesController extends Controller {

	public function home()
	{
		return View::make('laravelerator::controllers.pages.home');
	}

    public function routes()
    {
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
<?php namespace Laravelerator\Laravelerator;

use App;
use Route;
use View;
use Controller;

class PagesController extends Controller {

	public function home()
	{
		View::share('subTitle', ' - home');

		return View::make('laravelerator::controllers.pages.home');
	}

    public function routes()
    {
        // this is bullshit
        View::share('subTitle', ' - routes');

        $router = App::make('router')->getRoutes()->getRoutes();

        foreach ($router as $key => $route)
        {
            $routes[$key] = [
                'uri' => $route->getUri(),
                'name' => $route->getName(),
                'methods' => $route->methods(),
                'actionName' => $route->getActionName(),
                'beforeFilters' => implode('/', array_keys($route->beforeFilters())),
                'afterFilters' => implode('/', array_keys($route->afterFilters())),
                // 'action' => $route->getAction(),
            ];
        }

dm($route, 7);
dv($routes, 8);

        return View::make('laravelerator::controllers.pages.routes', compact('routes'));
    }


}
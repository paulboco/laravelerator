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

dd($router);




dm($router);

dv($router->getRoutes());

die;





// dp($route->getFacadeRoot());
        $foo = 'yes';
dd($foo);
        $artisan = App::make('artisan');
dd($artisan);

        // $app = App::make('artisan');
        // $artisan = null;
        // $artisan = Artisan::call(
        //     'routes',
        //     ['--env' => 'production']
        // );
// dd($app);

    }


}
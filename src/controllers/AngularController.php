<?php namespace Laravelerator\Laravelerator;

use App;
use Input;
use View;

class AngularController extends BaseController {

    public function __construct()
    {
        // sleep(2);
    }

    public function spa()
    {
        return View::make('laravelerator::angular-master');
    }

    public function home()
    {
        return View::make('laravelerator::controllers.pages.home');
    }

    public function generateCreate()
    {
        // Set testing defaults here
        $template = Input::old('template', 'scaffold');
        $table = Input::old('table', 'problems');
        $namespace = Input::old('namespace', 'Shiphed');
        $schema = Input::old('schema', "id : increments\nusername : string(100)\npassword : string(100)\n");
        $path = Input::old('path', 'app');
        $mock = Input::old('mock', 'true');

        return View::make('laravelerator::controllers.generate.create', get_defined_vars());
    }

    public function generateStore()
    {
        return View::make('laravelerator::controllers.generate.store');
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
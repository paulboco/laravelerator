<?php namespace Laravelerator\Laravelerator;

use Controller;
use Response;

class BaseController extends Controller {

    protected function sendResponse($contents, $headers = [])
    {
        $response = Response::make($contents);

        foreach ($headers as $key => $value)
        {
            $response->header($key, $value);
        }

        return $response;
    }


}
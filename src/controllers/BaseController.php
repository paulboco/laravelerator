<?php namespace Laravelerator\Laravelerator;

use Controller;
use Response;

class BaseController extends Controller {

    protected function fetchAsset($type, $file)
    {
        $basePath = realpath(__DIR__ . '/../views/assets');
        $assetPath = $basePath . '/' . $type . '/' . $file;
        $contents = file_get_contents($assetPath);

        $headers = ['Content-Type' => 'text/' . $type];

        return $this->sendResponse($contents, $headers);
    }

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
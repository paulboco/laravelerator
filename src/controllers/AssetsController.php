<?php namespace Laravelerator\Laravelerator;

use Request;

class AssetsController extends BaseController {

    protected $mime = [
        'css' => 'text/css',
        'javascript' => 'text/javascript',
        'json' => 'application/json',
    ];


    public function fetch($type)
    {
        $file = Request::query('f');

        return $this->fetchAsset($type, $file);
    }

    protected function fetchAsset($type, $file)
    {
        $basePath = realpath(__DIR__ . '/../views/assets');
        $assetPath = $basePath . '/' . $type . '/' . $file;
        $contents = file_get_contents($assetPath);

        $headers = ['Content-Type' => $this->mime[$type]];

        return $this->sendResponse($contents, $headers);
    }


}
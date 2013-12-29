<?php namespace Laravelerator\Laravelerator;

use Request;

class AssetsController extends BaseController {

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

        $headers = ['Content-Type' => 'text/' . $type];

        return $this->sendResponse($contents, $headers);
    }


}
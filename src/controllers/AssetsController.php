<?php namespace Laravelerator\Laravelerator;

use Response;

class AssetsController extends BaseController {

    public function __construct()
    {
        $this->assetsPath = realpath(__DIR__ . '/../views/assets');
    }

    public function css($file)
    {
        return $this->fetchAsset('css', $file);
    }

    public function javascript($file)
    {
        return $this->fetchAsset('javascript', $file);
    }

    protected function fetchAsset($type, $file)
    {
        $assetPath = $this->assetsPath . '/' . $type . '/' . $file;
        $contents = file_get_contents($assetPath);

        $response = Response::make($contents);

        $response->header('Content-Type', 'text/' . $type);

        return $response;
    }


}
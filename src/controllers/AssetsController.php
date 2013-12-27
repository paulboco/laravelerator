<?php namespace Laravelerator\Laravelerator;

class AssetsController extends BaseController {

    public function css($file)
    {
        return $this->fetchAsset('css', $file);
    }

    public function javascript($file)
    {
        return $this->fetchAsset('javascript', $file);
    }


}
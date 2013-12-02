<?php namespace Paulboco\Alg\Facades;

use Illuminate\Support\Facades\Facade;

class Manifest extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'alg.manifestcreator'; }

}
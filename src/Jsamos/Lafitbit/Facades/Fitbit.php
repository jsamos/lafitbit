<?php namespace Jsamos\Lafitbit\Facades;

use \Illuminate\Support\Facades\Facade as LaravelFacade;

class Fitbit extends LaravelFacade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'lafitbit'; }

}
<?php

namespace Dyankov\ShoppingCart\Laravel\Facades;

use Illuminate\Support\Facades\Facade;

class ShoppingCart extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'ShoppingCart';
    }
}

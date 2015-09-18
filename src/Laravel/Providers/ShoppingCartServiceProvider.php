<?php

namespace Dyankov\ShoppingCart\Laravel\Providers;

use Dyankov\ShoppingCart\ShoppingCart;
use Illuminate\Support\ServiceProvider;

class ShoppingCartServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('ShoppingCart', function() {
            return new ShoppingCart();
        });
    }
}
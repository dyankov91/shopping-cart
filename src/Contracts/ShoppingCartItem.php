<?php

namespace Dyankov\ShoppingCart\Contracts;

interface ShoppingCartItem
{
    /**
     * Returns the price of the item
     *
     * @return double
     */
    public function getPrice();

    /**
     * Item is on promotion
     *
     * @return bool
     */
    public function onPromotion();
}

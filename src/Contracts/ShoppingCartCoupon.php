<?php

namespace Dyankov\ShoppingCart\Contracts;

use Dyankov\ShoppingCart\ShoppingCart;

interface ShoppingCartCoupon
{
    /**
     * Discount sum to be substracte form the cart total.
     *
     * @param  ShoppingCart $cart
     *
     * @return double
     */
    public function discountSum(ShoppingCart $cart);
}

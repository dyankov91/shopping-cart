<?php

namespace Dyankov\ShoppingCart;

use Countable;
use Dyankov\ShoppingCart\Contracts\ShoppingCartItem;
use Dyankov\ShoppingCart\Contracts\ShoppingCartCoupon;

class ShoppingCart implements Countable
{
    /**
     * Shopping Cart Items Collection
     *
     * @var array
     */
    protected $items = [];

    /**
     * Shopping Cart Coupon
     *
     * @var mixed
     */
    protected $coupon = null;

    /**
     * Put an item in the cart.
     *
     * @param  ShoppingCartItem $item
     *
     * @return self
     */
    public function put(ShoppingCartItem $item)
    {
        $this->items[] = $item;

        return $this;
    }

    /**
     * Take out shopping cart item from the cart.
     *
     * @param  ShoppingCartItem $item to be took out.
     *
     * @return self
     */
    public function takeOut(ShoppingCartItem $itemToTakeOut)
    {
        $this->items = array_filter($this->items, function($item) use ($itemToTakeOut) {
            return $item !== $itemToTakeOut;
        });

        return $this;
    }

    /**
     * Apply a coupon to the cart.
     * Substract coupon discount sum from the cart total.
     *
     * @param  ShoppingCartCoupon $coupon
     *
     * @return self
     */
    public function applyCoupon(ShoppingCartCoupon $coupon)
    {
        $this->coupon = $coupon;

        return $this;
    }

    /**
     * Total sum of the items in the cart.
     *
     * @return double
     */
    public function total()
    {
        $sum = 0;

        foreach ($this->items as $item) {
            $sum += $item->getPrice();
        }

        if ($this->hasCouponApplied()) {
            if (!$this->isEmpty()) {
                $sum -= $this->coupon->discountSum($this);
            }
        }

        return (double) $sum;
    }

    /**
     * Either coupon is applied or not.
     *
     * @return boolean
     */
    public function hasCouponApplied()
    {
        return is_null($this->coupon) ? false : true;
    }

    /**
     * Count of the items in the cart
     * @satisfy Countable
     *
     * @return int
     */
    public function count()
    {
        return count($this->items);
    }

    /**
     * Is Cart Empty
     *
     * @return boolean
     */
    public function isEmpty()
    {
        return count($this->items) ? false : true;
    }
}

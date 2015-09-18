<?php

namespace spec\Dyankov\ShoppingCart;

use Prophecy\Argument;
use PhpSpec\ObjectBehavior;
use Dyankov\ShoppingCart\Contracts\ShoppingCartItem;
use Dyankov\ShoppingCart\Contracts\ShoppingCartCoupon;

class ShoppingCartSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Dyankov\ShoppingCart\ShoppingCart');
    }

    function it_holds_a_collection_of_shopping_cart_items(ShoppingCartItem $item1, ShoppingCartItem $item2)
    {
        $this->put($item1);
        $this->put($item2);

        $this->shouldHaveCount(2);
    }

    public function it_return_total_of_zero_when_nothing_is_put_inside()
    {
        $this->total()->shouldEqual(0.00);
    }

    function it_sums_the_prices_of_all_items_in_it(ShoppingCartItem $item1, ShoppingCartItem $item2)
    {
        $item1->getPrice()->willReturn(10.00);
        $this->put($item1);

        $item2->getPrice()->willReturn(14.90);
        $this->put($item2);

        $this->total()->shouldEqual(24.90);
    }

    function it_return_false_from_has_coupon_applied_when_coupon_is_not_applied()
    {
        $this->hasCouponApplied()->shouldBe(false);
    }

    function it_return_true_from_has_coupon_applied_when_coupon_is_applied(ShoppingCartCoupon $coupon)
    {
        $this->applyCoupon($coupon);

        $this->hasCouponApplied()->shouldBe(true);
    }

    function it_allows_using_of_discount_coupons(ShoppingCartItem $item1, ShoppingCartItem $item2, ShoppingCartCoupon $coupon)
    {
        $item1->getPrice()->willReturn(10.00);
        $this->put($item1);

        $item2->getPrice()->willReturn(14.90);
        $this->put($item2);

        $coupon->discountSum($this)->willReturn(2.00);
        $this->applyCoupon($coupon);

        $this->total()->shouldEqual(22.90);
    }

    function it_allows_item_to_be_removed_from_cart(ShoppingCartItem $item1, ShoppingCartItem $item2)
    {
        $item1->getPrice()->willReturn(10.00);
        $this->put($item1);

        $item2->getPrice()->willReturn(14.90);
        $this->put($item2);

        $this->takeOut($item2);

        $this->total()->shouldEqual(10.00);
    }

    function it_returns_zero_when_nothing_is_put_inside_and_coupon_is_applied(ShoppingCartCoupon $coupon)
    {
        $coupon->discountSum($this)->willReturn(2.00);
        $this->applyCoupon($coupon);

        $this->total()->shouldEqual(0.00);
    }
}

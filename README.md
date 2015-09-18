Shopping Cart
=============

Simple PHP shopping cart with coupons package.

## Installation

```bash
composer require dyankov/shopping-cart
```

## Usage

All items must implement `Dyankov\ShoppingCart\Contracts\ShoppingCartItem` so they can be put in the cart.
Coupons must implement `Dyankov\ShoppingCart\Contracts\ShoppingCartCoupon`.

* Put item in the cart:

```php
$cart = Dyankov\ShoppingCart\ShoppingCart();
$cart->put($shoppingCartItem);
```

* Take item out of the cart:

```php
$cart = Dyankov\ShoppingCart\ShoppingCart();
$cart->put($shoppingCartItem);
$cart->takeOut($shoppingCartItem);
```

* Cart total:

```php
$cart = Dyankov\ShoppingCart\ShoppingCart();
$cart->put($shoppingCartItem);
$cart->total();
```
* Apply coupon:

```php
$cart = Dyankov\ShoppingCart\ShoppingCart();
$cart->put($shoppingCartItem);
$cart->applyCoupon($shoppingCartCoupon);
```
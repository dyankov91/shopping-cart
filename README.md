Shopping Cart
=============

Simple PHP shopping cart with coupons package.

### Features

1. Holds a collection of ShoppingCartItems.
2. ShoppingCartItem is an interface with getPrice() and onPromotion() methods.
3. Have a total() method which gives the total price of all items in it.
4. Returns all items inside it via items() method.
5. Coupons with discount can be applied to it.
6. Every coupon has a method discountSum() which takes a ShoppingCart instanstace.
7. The coupon is responsible for calculationg the total sum which will be substracted from the total of the cart.
8. Coupons can be value coupon, percent coupon, 3 on the price of 2, etc. They have their own logic to calculate the sum.
9. It have a persist() system to save the items in cookie.
10. Coupon discount is not applied to producs on promotion.
11. If there is nothing in the cart coupon is not applied. 0 total - 10% = 0 total.
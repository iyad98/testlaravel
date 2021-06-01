<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Front\HomeController@index');
Route::post('add/cart', 'Front\HomeController@add_cart')->name('front.add.cart');
Route::get('checkout/{total}', 'Front\CheckoutController@index')->name('front.checkout');
Route::get('cart' , 'Front\UserController@myCart')->name('front.my.carts');

Route::post('coupon/discount' , 'Front\UserController@coupon_discount')->name('front.coupon_discount');
Route::post('add/cart/ajax' , 'Front\UserController@addQuantity')->name('front.add.cart.ajax');
Route::post('delete/cart/ajax' , 'Front\UserController@deleteQuantity')->name('front.delete.cart.ajax');
Route::post('delete/product/from/cart/{id}' , 'Front\UserController@deleteproductfromcart')->name('front.delete.product.from.cart');



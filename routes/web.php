<?php

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

//frontend routes

Route::namespace('Frontend')->group(function() {
	Route::get('/','HomeController@index')->name('home');
	Route::post('/authuser','loginController@authuser')->name('authuser');

	Route::prefix('/blog')->group(function() {
		Route::get('','BlogController@index')->name('blog.index');
		Route::get('/{slug}','BlogController@slug')->name('blog.detail');
	});

	Route::post('/cart','CartController@submit')->name('cart.submit');
	Route::post('/cartdelete','CartController@delete')->name('cart.delete');

	Route::get('/contact','ContactController@index')->name('contact');
	Route::resource('/checkout','CheckoutController');
	Route::get('/checkout-coupons','CheckoutController@coupons')->name('checkout.coupons');
	Route::post('/checkout-order','CheckoutController@order')->name('checkout.order');;
	Route::get('/edit-account','LoginController@editaccount')->name('login.edit');
	Route::post('/edit-account','LoginController@storeedit')->name('login.store');;
	Route::get('/filter-product','ShopController@filter')->name('shop.filter');;
	Route::get('/invoices/{slug}','OrdersController@invoice')->name('orders.invoices');
	Route::get('/login','loginController@index')->name('login');
	Route::get('/logout','loginController@logout')->name('logout');
	Route::post('/subscriber','SubscriberController@submit')->name('subscriber');;
	Route::get('/my-account','loginController@myAccount')->name('login.myaccount');
	Route::get('/order-success','OrdersController@success')->name('orders.success');
	Route::get('/page/{slug}','PageController@slug')->name('page.index');
	Route::get('/products/{slug}','ProductsController@index')->name('products.index');
	Route::get('/products-category/{slug}','ProductsCategoryController@index')->name('products.category');
	Route::get('/search-product','ShopController@search')->name('shop.search');
	Route::get('/shipping-cost','OrdersController@shipping_cost')->name('orders.shippingcost');
	Route::get('/shop','ShopController@index')->name('shop');
	
	Route::post('/store-register','LoginController@storeregister')->name('login.storeregister');
	Route::get('/register','LoginController@register')->name('register');
	Route::get('/register-success','LoginController@registersuccess')->name('register.registersuccess');
});

//custom routes backend - admin
Route::get('admin/api/city','Frontend\CityController@getJson');
Route::get('admin/api/coupons','AdminCouponsController@getJson');
Route::get('admin/products/deleteProductsImage','AdminProductsController@deleteProductsImage');

// Route::middleware('auth:customer')->get('test-auth-customer', function () {
//     $customer = auth()->guard('customer')->user();
//     return "Ok sudah login sebagai '{$customer->name}'."; // coba akses '/test-auth-customer' sebelum sama sesudah login
// });
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

Route::get('/','FrontEnd@index');
Auth::routes();

Route::resource('/admin/product/category', 'ProductCategoryController');
Route::resource('/admin/manufacturer', 'ManufacturerController');
Route::resource('/admin/product','ProductController');
Route::resource('/admin/Profile', 'AdminProfileController');
Route::get('/admin/order', 'OrderController@index')->name('order');
Route::resource('/shop', 'FrontProductController');
Route::get('/cart', 'ShoppingCartController@index')->name('cart');
Route::post('/addToCart', 'ShoppingCartController@addTocart')->name('addToCart');
Route::get('/removeItem/{id}','ShoppingCartController@removeItem')->name('removeItem');
Route::get('/checkout','CheckOutController@index')->name('checkout');
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/checkout', 'CheckOutController@addShippingDetails')->name('addShippingDetails');
Route::get('export', 'ExcelController@export')->name('export');
Route::post('import', 'ExcelController@import')->name('import');
Route::post('wishlist','WishlistController@addTowish')->name('wishlist');
Route::post('/shipping' ,'CheckOutController@shipping')->name('shipping');
Route::post('pay', 'PayController@pay');
Route::get('pay-success', 'PayController@success');
Route::get('buyer','UserController@index')->name('buyer');
Route::get('/buyer/wishlist' ,'UserController@wishlist')->name('buyer_wishlist');
Route::get('/buyer/order' ,'UserController@order')->name('buyer_order');
Route::get('/buyer/profile' , 'UserController@profile')->name('buyer_profile');
Route::get('/buyer/cart' ,'UserController@cart')->name('buyer_cart');
Route::get('/buyer/profile/{id}/edit', 'UserController@profile_edit')->name('buyer_profile_edit');
Route::post('/search','SearchController@search')->name('search');

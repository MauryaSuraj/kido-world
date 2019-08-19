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
Auth::routes(['verify' => true]);
Route::get('/','FrontEnd@index');
Route::get('/contact', 'FrontEnd@contact')->name('contact');
Route::get('/about', 'FrontEnd@about')->name('about');
Route::post('contact_form', 'FrontEnd@contactinsert')->name('contact_form');
Route::get('terms', 'FrontEnd@terms')->name('terms');
Route::get('privacy', 'FrontEnd@privacy')->name('privacy');
Route::get('returnpolicy', 'FrontEnd@returnpolicy')->name('returnpolicy');
Route::get('refundpolicy', 'FrontEnd@refundPolicy')->name('refundpolicy');
Route::get('shippingpolicy', 'FrontEnd@shipping')->name('shippingpolicy');

Route::resource('/admin/product/category', 'ProductCategoryController');
Route::resource('/admin/manufacturer', 'ManufacturerController');
Route::resource('/admin/product','ProductController');
Route::resource('/admin/Profile', 'AdminProfileController');
Route::resource('/admin/dynamicPage', 'DynamicPagesController');
Route::get('/admin/order', 'OrderController@index')->name('order');
Route::post('/admin/order_status' ,'OrderController@order_status')->name('order_status');
Route::resource('/shop', 'FrontProductController');
Route::get('/cart', 'ShoppingCartController@index')->name('cart');
Route::post('/addToCart', 'ShoppingCartController@addTocart')->name('addToCart');
Route::post('/removeItem/{id}','ShoppingCartController@removeItem')->name('removeItem');
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
Route::get('/product/category/{id}', 'CategorySearchControler@search');
Route::post('/search_admin','SearchController@search_admin')->name('search_admin');
Route::resource('/admin/discount', 'DiscountController');

Route::post('/discount', 'CheckOutController@discount')->name('discount');
Route::get('order/export', 'OrderControllerExcel@export')->name('order_export');
Route::post('/review', 'ReviewsController@store')->name('review');

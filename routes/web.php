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

Route::resource('admin/product/category', 'ProductCategoryController');
Route::resource('admin/manufacturer', 'ManufacturerController');
Route::resource('admin/product','ProductController');
Route::resource('admin/Profile', 'AdminProfileController');
Route::resource('/product', 'FrontProductController');

Route::get('/home', 'HomeController@index')->name('home');

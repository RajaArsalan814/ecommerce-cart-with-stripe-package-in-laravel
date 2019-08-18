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

Route::get('/', 'FrontEndController@index');
Route::get('/single_product/{id}', 'FrontEndController@single_product')->name('product.single');
Route::post('/add_to_cart', 'ShoppingController@add_to_cart')->name('cart.add');
Route::get('/cart', 'ShoppingController@cart')->name('cart');
Route::get('/cart/remove/{id}', 'ShoppingController@cart_remove')->name('cart.delete');
Route::get('/cart/inc/{id}/{qty}', 'ShoppingController@inc')->name('cart.inc');
Route::get('/cart/dec/{id}/{qty}', 'ShoppingController@dec')->name('cart.dec');
Route::get('/cart/single/{id}', 'ShoppingController@cart_single')->name('cart.single');
Route::get('/cart/checkout', 'CheckOutController@index')->name('checkout');
Route::post('/cart/checkout', 'CheckOutController@pay')->name('cart.checkout');

Auth::routes();
Route::group(['middleware' => ['auth']], function () {

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/products', 'ProductController@index')->name('products');
    Route::get('/product/create', 'ProductController@create')->name('product.create');
    Route::post('/products/store', 'ProductController@store')->name('product.store');
    Route::get('/product/edit/{id}', 'ProductController@edit')->name('product.edit');
    Route::post('/product/update/{id}', 'ProductController@update')->name('product.update');
    Route::get('/products/delete/{id}', 'ProductController@delete')->name('product.delete');
        
});

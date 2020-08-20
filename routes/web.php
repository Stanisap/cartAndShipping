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

Route::group(['prefix' => 'cart'], function () {
    Route::get('/', "CartController@index")->name('cart');

    Route::get('/add/{product}', 'CartController@cartAdd')->name('cart-add');
    Route::get('/remove/{product}', 'CartController@cartRemove')->name('cart-remove');
    Route::get('/remove-all/{product}', 'CartController@cartAllRemove')->name('cart-all-remove');

});



Route::get('/shipping', 'ShippingController@index')->name('shipping');
Route::post('/shipping/confirm', 'ShippingController@confirm')->name('shipping-confirm');

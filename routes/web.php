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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/shop', 'ShopController@index')->name('shop.index');
Route::get('shop/{id}', 'ShopController@getShop')->name('shop.name');

Route::get('order/{id}', 'OrderController@getDetailOrder')->name('order.detail');

Route::get('voucher', 'VoucherController@index')->name('voucher.index');
Route::get('voucher/{id}', 'VoucherController@getOrderVoucher')->name('voucher.order');

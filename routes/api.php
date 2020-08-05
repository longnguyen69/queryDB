<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('get-shops', 'ShopController@index');
Route::get('get-shop/{id}', 'ShopController@getShop');
Route::get('count-shops/{id}', 'ShopController@getOrder');
Route::get('name-shops/{shop}', 'ShopController@getColumn');

Route::get('get-all-order', 'OrderController@index');
Route::get('get-detail-order/{id}', 'OrderController@getOrder');
Route::post('store-order', 'OrderController@store');
Route::delete('delete-order/{id}', 'OrderController@destroy');
Route::put('update-order/{id}', 'OrderController@update');

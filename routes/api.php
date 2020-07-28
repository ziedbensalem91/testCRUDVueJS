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
Route::get('/customers', 'CustomerController@index')->name('customer.index');
Route::post('/customerStore', 'CustomerController@store')->name('customer.store');
Route::get('/customer/Edit/{id}', 'CustomerController@edit')->name('customer.edit');
Route::post('/customer/Edit/{id}', 'CustomerController@update')->name('customer.update');
Route::post('/customer/delete/{id}', 'CustomerController@delete')->name('customer.delete');






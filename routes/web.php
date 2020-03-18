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

Route::get('/', 'HomeController@index');
Route::get('/layout', function () {
    return view('layout');
});
Route::resource('spares', 'SpareController');
Route::resource('clients', 'ClientController');
Route::resource('stores', 'StoreController');
Route::resource('sales', 'SaleController');
Route::resource('providers', 'ProviderController');
Route::resource('purchases', 'PurchasesController');


Route::get('filter-products', 'SpareController@filter')->name('filter-products');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

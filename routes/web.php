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

Route::resource('spares', 'SparesController');
Route::resource('brands', 'BrandsController');
Route::resource('categories', 'CategoriesController');
Route::resource('car_lines', 'CarLinesController');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('filter-products', 'SparesController@filter')->name('filter-products');


// Not using


Route::resource('sales', 'SaleController');
Route::resource('purchases', 'PurchaseController');


Route::group([
    'prefix' => 'clients',
], function () {
    Route::get('/', 'ClientsController@index')
         ->name('clients.clients.index');
    Route::get('/create','ClientsController@create')
         ->name('clients.clients.create');
    Route::get('/show/{clients}','ClientsController@show')
         ->name('clients.clients.show');
    Route::get('/{clients}/edit','ClientsController@edit')
         ->name('clients.clients.edit');
    Route::post('/', 'ClientsController@store')
         ->name('clients.clients.store');
    Route::put('clients/{clients}', 'ClientsController@update')
         ->name('clients.clients.update');
    Route::delete('/clients/{clients}','ClientsController@destroy')
         ->name('clients.clients.destroy');
});

Route::group([
    'prefix' => 'providers',
], function () {
    Route::get('/', 'ProvidersController@index')
         ->name('providers.providers.index');
    Route::get('/create','ProvidersController@create')
         ->name('providers.providers.create');
    Route::get('/show/{providers}','ProvidersController@show')
         ->name('providers.providers.show');
    Route::get('/{providers}/edit','ProvidersController@edit')
         ->name('providers.providers.edit');
    Route::post('/', 'ProvidersController@store')
         ->name('providers.providers.store');
    Route::put('providers/{providers}', 'ProvidersController@update')
         ->name('providers.providers.update');
    Route::delete('/providers/{providers}','ProvidersController@destroy')
         ->name('providers.providers.destroy');
});

Route::group([
    'prefix' => 'clients',
], function () {
    Route::get('/', 'ClientsController@index')
         ->name('clients.client.index');
    Route::get('/create','ClientsController@create')
         ->name('clients.client.create');
    Route::get('/show/{client}','ClientsController@show')
         ->name('clients.client.show');
    Route::get('/{client}/edit','ClientsController@edit')
         ->name('clients.client.edit');
    Route::post('/', 'ClientsController@store')
         ->name('clients.client.store');
    Route::put('client/{client}', 'ClientsController@update')
         ->name('clients.client.update');
    Route::delete('/client/{client}','ClientsController@destroy')
         ->name('clients.client.destroy');
});

Route::group([
    'prefix' => 'stores',
], function () {
    Route::get('/', 'StoresController@index')
         ->name('stores.store.index');
    Route::get('/create','StoresController@create')
         ->name('stores.store.create');
    Route::get('/show/{store}','StoresController@show')
         ->name('stores.store.show');
    Route::get('/{store}/edit','StoresController@edit')
         ->name('stores.store.edit');
    Route::post('/', 'StoresController@store')
         ->name('stores.store.store');
    Route::put('store/{store}', 'StoresController@update')
         ->name('stores.store.update');
    Route::delete('/store/{store}','StoresController@destroy')
         ->name('stores.store.destroy');
});

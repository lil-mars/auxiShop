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

Route::resource('spares', 'SparesController')->middleware(['auth']);
Route::resource('brands', 'BrandsController')->middleware(['auth']);
Route::resource('categories', 'CategoriesController')->middleware(['auth']);
Route::resource('car_lines', 'CarLinesController')->middleware(['auth']);

Auth::routes(['register' => false, 'reset'=>false]);
Route::get('/home', 'HomeController@index')->name('home')->middleware(['auth']);
Route::get('filter-products', 'SparesController@filter')->name('filter-products');


// Not using


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
         ->name('providers.provider.index');
    Route::get('/create','ProvidersController@create')
         ->name('providers.provider.create');
    Route::get('/show/{provider}','ProvidersController@show')
         ->name('providers.provider.show');
    Route::get('/{provider}/edit','ProvidersController@edit')
         ->name('providers.provider.edit');
    Route::post('/', 'ProvidersController@store')
         ->name('providers.provider.store');
    Route::put('provider/{provider}', 'ProvidersController@update')
         ->name('providers.provider.update');
    Route::delete('/provider/{provider}','ProvidersController@destroy')
         ->name('providers.provider.destroy');
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
Route::group([
    'prefix' => 'sales',
], function () {
    Route::get('/', 'SalesController@index')
         ->name('sales.sale.index');
    Route::get('/create','SalesController@create')
         ->name('sales.sale.create');
    Route::get('/show/{sale}','SalesController@show')
         ->name('sales.sale.show');
    Route::get('/{sale}/edit','SalesController@edit')
         ->name('sales.sale.edit');
    Route::post('/', 'SalesController@store')
         ->name('sales.sale.store');
    Route::put('sale/{sale}', 'SalesController@update')
         ->name('sales.sale.update');
    Route::delete('/sale/{sale}','SalesController@destroy')
         ->name('sales.sale.destroy');
});

Route::group([
    'prefix' => 'purchases',
], function () {
    Route::get('/', 'PurchasesController@index')
         ->name('purchases.purchase.index');
    Route::get('/create','PurchasesController@create')
         ->name('purchases.purchase.create');
    Route::get('/show/{purchase}','PurchasesController@show')
         ->name('purchases.purchase.show');
    Route::get('/{purchase}/edit','PurchasesController@edit')
         ->name('purchases.purchase.edit');
    Route::post('/', 'PurchasesController@store')
         ->name('purchases.purchase.store');
    Route::put('purchase/{purchase}', 'PurchasesController@update')
         ->name('purchases.purchase.update');
    Route::delete('/purchase/{purchase}','PurchasesController@destroy')
         ->name('purchases.purchase.destroy');
});

Route::resource('purchases.spare', 'PurchaseSparesController');
Route::resource('sales.spare', 'SaleDetailsController');



Route::group([
    'middleware' => ['auth', 'role:admin'],
    'prefix' => 'users',
], function () {
    Route::get('/', 'UsersController@index')
         ->name('users.user.index');
    Route::get('/create','UsersController@create')
         ->name('users.user.create');
    Route::get('/show/{user}','UsersController@show')
         ->name('users.user.show');
    Route::get('/{user}/edit','UsersController@edit')
         ->name('users.user.edit');
    Route::post('/', 'UsersController@store')
         ->name('users.user.store');
    Route::put('user/{user}', 'UsersController@update')
         ->name('users.user.update');
    Route::delete('/user/{user}','UsersController@destroy')
         ->name('users.user.destroy');
});

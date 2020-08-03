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

//Spares
Route::resource('spares', 'SparesController')->except(['index'])->middleware(['auth', 'role:admin']);
Route::get('spares', 'SparesController@index')->middleware(['auth'])->name('spares.index');

Route::resource('brands', 'BrandsController')->middleware(['auth', 'role:admin']);
Route::resource('categories', 'CategoriesController')->middleware(['auth', 'role:admin']);
Route::resource('car_lines', 'CarLinesController')->middleware(['auth', 'role:admin']);

Auth::routes(['register' => false, 'reset' => false]);
Route::get('/home', 'HomeController@index')->name('home')->middleware(['auth']);
Route::get('filter-products', 'SparesController@filter')->name('filter-products')->middleware(['auth']);


// Clients allow all users
Route::group([
    'prefix' => 'clients',
    'middleware' => ['auth']
], function () {
    Route::get('/', 'ClientsController@index')
        ->name('clients.clients.index');
    Route::get('/create', 'ClientsController@create')
        ->name('clients.clients.create');
    Route::get('/show/{clients}', 'ClientsController@show')
        ->name('clients.clients.show');
    Route::get('/{clients}/edit', 'ClientsController@edit')
        ->name('clients.clients.edit');
    Route::post('/', 'ClientsController@store')
        ->name('clients.clients.store');
    Route::put('clients/{clients}', 'ClientsController@update')
        ->name('clients.clients.update');
    Route::delete('/clients/{clients}', 'ClientsController@destroy')
        ->name('clients.clients.destroy');
});

//Providers only admin
Route::group([
    'prefix' => 'providers',
    'middleware' => ['auth', 'role:admin']
], function () {
    Route::get('/', 'ProvidersController@index')
        ->name('providers.provider.index');
    Route::get('/create', 'ProvidersController@create')
        ->name('providers.provider.create');
    Route::get('/show/{provider}', 'ProvidersController@show')
        ->name('providers.provider.show');
    Route::get('/{provider}/edit', 'ProvidersController@edit')
        ->name('providers.provider.edit');
    Route::post('/', 'ProvidersController@store')
        ->name('providers.provider.store');
    Route::put('provider/{provider}', 'ProvidersController@update')
        ->name('providers.provider.update');
    Route::delete('/provider/{provider}', 'ProvidersController@destroy')
        ->name('providers.provider.destroy');
});

Route::group([
    'prefix' => 'clients',
    'middleware' => ['auth'],
], function () {
    Route::get('/', 'ClientsController@index')
        ->name('clients.client.index');
    Route::get('/create', 'ClientsController@create')
        ->name('clients.client.create');
    Route::get('/show/{client}', 'ClientsController@show')
        ->name('clients.client.show');
    Route::get('/{client}/edit', 'ClientsController@edit')
        ->name('clients.client.edit');
    Route::post('/', 'ClientsController@store')
        ->name('clients.client.store');
    Route::put('client/{client}', 'ClientsController@update')
        ->name('clients.client.update');
    Route::delete('/client/{client}', 'ClientsController@destroy')
        ->name('clients.client.destroy');
});

// Stores only users
Route::group([
    'prefix' => 'stores',
    'middleware' => ['auth'],
], function () {
    Route::get('/', 'StoresController@index')
        ->name('stores.store.index');
    Route::get('/create', 'StoresController@create')
        ->name('stores.store.create');
    Route::get('/show/{store}', 'StoresController@show')
        ->name('stores.store.show');
    Route::get('/{store}/edit', 'StoresController@edit')
        ->name('stores.store.edit');
    Route::get('/{store}/list', 'StoresController@list')
        ->name('stores.store.list');
    Route::post('/', 'StoresController@store')
        ->name('stores.store.store');

    // Store quantities
    Route::post('{store}/spares', 'StoresController@storeQuantities')
        ->name('stores.store.quantity');
    Route::delete('{spare}/spares', 'StoresController@destroyQuantities')
        ->name('stores.store.delete.quantity')->middleware('role:admin');
    Route::put('store/{store}', 'StoresController@update')
        ->name('stores.store.update');
    Route::delete('/store/{store}', 'StoresController@destroy')
        ->name('stores.store.destroy');
});
// Sales allow all users
Route::group([
    'prefix' => 'sales',
    'middleware' => ['auth'],
], function () {
    Route::get('/', 'SalesController@index')
        ->name('sales.sale.index');
    Route::get('/create', 'SalesController@create')
        ->name('sales.sale.create');
    Route::get('/show/{sale}', 'SalesController@show')
        ->name('sales.sale.show');
    Route::get('/{sale}/edit', 'SalesController@edit')
        ->name('sales.sale.edit');
    Route::get('/sales/calendar', 'SalesController@calendar')->middleware('role:admin')
        ->name('sales.sale.calendar');
    Route::post('/', 'SalesController@store')
        ->name('sales.sale.store');
    Route::put('sale/{sale}', 'SalesController@update')
        ->name('sales.sale.update');
    Route::delete('/sale/{sale}', 'SalesController@destroy')
        ->name('sales.sale.destroy');
});

// Purchases only admin
Route::group([
    'prefix' => 'purchases',
    'middleware' => ['auth', 'role:admin'],
], function () {
    Route::get('/', 'PurchasesController@index')
        ->name('purchases.purchase.index');
    Route::get('/create', 'PurchasesController@create')
        ->name('purchases.purchase.create');
    Route::get('/show/{purchase}', 'PurchasesController@show')
        ->name('purchases.purchase.show');
    Route::get('/{purchase}/edit', 'PurchasesController@edit')
        ->name('purchases.purchase.edit');
    Route::post('/', 'PurchasesController@store')
        ->name('purchases.purchase.store');
    Route::put('purchase/{purchase}', 'PurchasesController@update')
        ->name('purchases.purchase.update');
    Route::delete('/purchase/{purchase}', 'PurchasesController@destroy')
        ->name('purchases.purchase.destroy');
});

Route::resource('purchases.spare', 'PurchaseSparesController')->middleware(['auth']);
Route::resource('sales.spare', 'SaleDetailsController')->except(['destroy'])->middleware(['auth']);
Route::delete('sales/destroy/{sale}/{spare}/{store}/{detail}', 'SaleDetailsController@destroy')->name('sales.spare.destroy')->middleware(['auth']);
Route::post('categoriesStoreAndBack', 'CategoriesController@storeAndBack')->name('categoryStoreAndBack')->middleware(['auth', 'role:admin']);
Route::post('carlineStoreAndBack', 'CarLinesController@storeAndBack')->name('carlineStoreAndBack')->middleware(['auth', 'role:admin']);
Route::post('brandsStoreAndBack', 'BrandsController@storeAndBack')->name('brandStoreAndBack')->middleware(['auth', 'role:admin']);

Route::group([
    'middleware' => ['auth', 'role:admin'],
    'prefix' => 'users',
], function () {
    Route::get('/', 'UsersController@index')
        ->name('users.user.index');
    Route::get('/create', 'UsersController@create')
        ->name('users.user.create');
    Route::get('/{user}/stores', 'UsersController@stores')
        ->name('users.user.stores');
    Route::get('/show/{user}', 'UsersController@show')
        ->name('users.user.show');
    Route::get('/{user}/edit', 'UsersController@edit')
        ->name('users.user.edit');
    Route::get('/{user}/password', 'UsersController@editPassword')
        ->name('users.user.password');
    Route::post('/', 'UsersController@store')
        ->name('users.user.store');
    Route::put('user/{user}', 'UsersController@update')
        ->name('users.user.update');
    Route::post('{user}/stores', 'UsersController@setStores')
        ->name('users.user.set.stores');
    Route::put('password/{user}', 'UsersController@updatePassword')
        ->name('users.user.updatePassword');
    Route::delete('/user/{user}', 'UsersController@destroy')
        ->name('users.user.destroy');
});

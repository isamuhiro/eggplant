<?php

use Illuminate\Http\Request;

Route::middleware('auth:clients')->get('/client', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:managers')->get('/manager', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:drivers')->get('/driver', function (Request $request) {
    return $request->user();
});

Route::get('motorista/pedidos/{id}', 'DriversController@showDriversOs');

Route::resource('clients','AdministratorController');

Route::resource('produtos', 'ProductApiController');
Route::resource('stores', 'StoreController');
Route::resource('managers', 'ManagerController');
Route::resource('orders', 'OrderController');

Route::resource('v2/stores', 'StoreControllerApi');
Route::resource('v2/managers', 'ManagerControllerApi');

Route::get('gerentesDropList', 'ManagerController@gerentesDropList');
Route::get('getLastOrdemServico', 'OrderController@getLastOrdemServico');

Route::get('manager-order/{id}','OrderController@retrieveManagerOrder');
Route::get('client-order/{id}','OrderController@retrieveClientOrder');

Route::get('products_from_client/{id}','ClientController@productClientSelected');
Route::post('products_from_client','ClientController@storeProductsOnClientSelected');

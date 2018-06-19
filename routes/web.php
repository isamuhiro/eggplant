<?php

Route::get('/', 'HomeController@index')->name('home');
Route::get('login', 'HomeController@login');
Route::get('register', 'HomeController@register');
Route::resource('produtos', 'ProductController');
Route::get('retrieve-amount', 'ProductController@retrieveAmount');
Route::resource('clientes', 'ClientController');
Route::resource('gerentes', 'ManagerController');
Route::resource('motoristas', 'DriversController');
Route::put('gerentes/active/{id}', 'ManagerController@active');
Route::put('clientes/active/{id}', 'ClientController@active');
Route::put('clientes/update_profile/{id}', 'ClientController@updatePerfil');

Route::group(['prefix'=> "pedidos"], function(){
	Route::get("historico", 'OsController@historicoPedidos');
	Route::get("create", 'OsController@create');
	Route::delete('delete-history/{id}', 'OsController@destroy');
	Route::get('detalhes-pedido/{os_id}','OrderController@show');
	Route::put('detalhes-pedido/{os_id}','OrderController@update');
	Route::post('detalhes-pedido/status','OrderController@status');
}); 
Route::group(['prefix' => 'rotas'], function(){
	Route::resource('/config', 'RotasController');
});

Route::get('store/{id}','StoreController@edit');
Route::put('store/{id}','StoreController@updateStore');
Route::get('store','StoreController@allStores');
Route::post('store','StoreController@storeStore');
Route::get('schedule' ,'ScheduleController@schedule');
Route::post('schedule' ,'ScheduleController@store');



Auth::routes();
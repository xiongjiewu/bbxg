<?php
Route::get('/list',['as' => 'good.list', 'uses' => 'ListController@index']);
Route::get('/detail/{id}',['as' => 'good.detail', 'uses' => 'ListController@show']);
Route::post('/detail/{id}','ListController@store');
Auth::routes();
Route::get('/home', ['as' => 'admin.home', 'uses' => 'HomeController@index']);
Route::get('/', 'HomeController@index');
Route::put('/admin/down/{id}', ['middleware' => ['auth'], 'uses' => 'HomeController@down']);
Route::get('/admin/good/add', ['middleware' => ['auth'], 'as' => 'admin.good.add', 'uses' => 'HomeController@add']);
Route::post('/admin/good/add', ['middleware' => ['auth'], 'as' => 'admin.good.addAction', 'uses' => 'HomeController@addAction']);
Route::get('/admin/order/list', ['middleware' => ['auth'], 'as' => 'admin.order.list', 'uses' => 'OrderController@index']);
Route::put('/admin/order/{id}/{action}', ['middleware' => ['auth'], 'as' => 'admin.order.action', 'uses' => 'OrderController@action']);
Route::get('/admin/classification/list', ['middleware' => ['auth'], 'as' => 'admin.classification.list', 'uses' => 'ClassificationController@index']);
Route::get('/admin/classification/add', ['middleware' => ['auth'], 'as' => 'admin.classification.add', 'uses' => 'ClassificationController@add']);
Route::post('/admin/classification/add', ['middleware' => ['auth'], 'as' => 'admin.classification.addAction', 'uses' => 'ClassificationController@addAction']);
Route::get('/admin/order/export', ['middleware' => ['auth'], 'as' => 'admin.order.export', 'uses' => 'OrderController@export']);

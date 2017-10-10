<?php

/**
 * Global Routes
 * Routes that are used between both frontend and backend.
 */

// Switch between the included languages
Route::get('lang/{lang}', 'LanguageController@swap');

/* ----------------------------------------------------------------------- */

/*
 * Frontend Routes
 * Namespaces indicate folder structure
 */
Route::group(['namespace' => 'Frontend', 'as' => 'frontend.'], function () {
    includeRouteFiles(__DIR__.'/Frontend/');
});

/* ----------------------------------------------------------------------- */

/*
 * Backend Routes
 * Namespaces indicate folder structure
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    /*
     * These routes need view-backend permission
     * (good if you want to allow more than one group in the backend,
     * then limit the backend features by different roles or permissions)
     *
     * Note: Administrator has all permissions so you do not have to specify the administrator role everywhere.
     */
    includeRouteFiles(__DIR__.'/Backend/');
//    Route::post('/addfields', ['as'=>'postField', 'uses'=>'AddFieldsController@postField']);
});

Route::get('add/brand','AddFieldsController@createBrand')->name('addBrand');
Route::get('add/category','AddFieldsController@createCat')->name('addCat');
Route::get('add/group','AddFieldsController@createGroup')->name('addGruop');
Route::get('show/fields',['as'=>'showFields', 'uses'=>'AddFieldsController@showFields']);
Route::resource('DelBrand', 'DeleteBrand');
Route::resource('DelCat', 'DeleteCategory');
Route::resource('DelGroup', 'DeleteGroup');
//======================================================================================================================
/**
 * for product
 */
Route::get('product/list.html',     ['uses'=>'ProductController@index']);
Route::get('product/create.html',   ['uses'=>'ProductController@create']);
Route::post('product/store',        ['uses'=>'ProductController@store']);
Route::get('product/show/{id}',     ['uses'=>'ProductController@show']);
Route::get('product/edit/{id}',     ['uses'=>'ProductController@edit']);
Route::post('product/update',       ['uses'=>'ProductController@update']);
Route::get('product/delete/{id}',   ['uses'=>'ProductController@destroy']);
Route::get('product/search',        ['uses'=>'ProductController@search']);

//======================================================================================================================
/**
 * for supplier
 */
Route::get('supplier/list.html',    ['uses'=>'SupplierController@index']);
Route::get('supplier/create.html',  ['uses'=>'SupplierController@create']);
Route::get('supplier/store',        ['uses'=>'SupplierController@store']);
Route::get('supplier/show/{id}',    ['uses'=>'SupplierController@show']);
Route::get('supplier/edit/{id}',    ['uses'=>'SupplierController@edit']);
Route::post('supplier/update',      ['uses'=>'SupplierController@update']);
Route::get('supplier/delete/{id}',  ['uses'=>'SupplierController@destroy']);
Route::get('supplier/search',       ['uses'=>'SupplierController@search']);

//======================================================================================================================
/**
 * for customer
 */
Route::get('customer/list.html',    ['uses'=>'CustomerController@index']);
Route::get('customer/create.html',  ['uses'=>'CustomerController@create']);
Route::get('customer/store',        ['uses'=>'CustomerController@store']);
Route::get('customer/show/{id}',    ['uses'=>'CustomerController@show']);
Route::get('customer/edit/{id}',    ['uses'=>'CustomerController@edit']);
Route::post('customer/update',      ['uses'=>'CustomerController@update']);
Route::get('customer/delete/{id}',  ['uses'=>'CustomerController@destroy']);
Route::get('customer/search',       ['uses'=>'CustomerController@search']);

//======================================================================================================================
/**
 * for order
 */
Route::get('order/list.html',   ['uses'=>'OrderController@index']);
Route::get('order/create.html', ['uses'=>'OrderController@create']);
Route::get('order/store',       ['uses'=>'OrderController@store']);
Route::get('order/show/{id}',   ['uses'=>'OrderController@show']);
Route::get('order/edit/{id}',   ['uses'=>'OrderController@edit']);
Route::post('order/update',     ['uses'=>'OrderController@update']);
Route::get('order/delete/{id}', ['uses'=>'OrderController@destroy']);
Route::get('order/search',      ['uses'=>'OrderController@search']);

Route::get('oreder/product', ['uses'=>'OrderController@orderProduct']);



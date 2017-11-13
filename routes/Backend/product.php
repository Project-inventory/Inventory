<?php

Route::group(['prefix' => 'products', 'namespace' => 'Product'], function (){

    Route::get('', 'ProductController@index')->name('products.index');
    Route::get('create', 'ProductController@create')->name('products.create');
    Route::get('{product}/edit', 'ProductController@edit')->name('products.edit');
    Route::get('/show', 'ProductController@show')->name('products.show');
    Route::get('{product}/delete', 'ProductController@destroy')->name('products.delete');
    Route::post('update', 'ProductController@update')->name('products.update');
    Route::post('store', 'ProductController@store')->name('products.store');
    /**
     * ajax for get product
     */
    Route::get('get-products', 'ProductController@getProduct');
    Route::get('get-low-products', 'ProductController@getLowProduct');
});
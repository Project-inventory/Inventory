<?php

Route::group(['prefix' => 'sellings', 'namespace' => 'Selling'], function (){

    Route::get('', 'SellingController@index')->name('sellings.index');
    Route::get('create', 'SellingController@create')->name('sellings.create');
    Route::get('{selling}/edit', 'SellingController@edit')->name('sellings.edit');
    Route::get('{clear', 'SellingController@clear')->name('sellings.clear');
    Route::get('{selling}/delete', 'SellingController@destroy')->name('sellings.delete');
    Route::post('update', 'SellingController@update')->name('sellings.update');
    Route::post('store', 'SellingController@store')->name('sellings.store');
    /**
     * ajax for get supplier
     */
    Route::get('get-products', 'SellingController@getProduct');
});
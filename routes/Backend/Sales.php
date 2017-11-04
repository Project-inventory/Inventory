<?php

Route::group(['prefix' => 'sales', 'namespace' => 'Sales'], function (){

    Route::get('', 'SalesController@index')->name('sales.index');
    Route::get('create', 'SalesController@create')->name('sales.create');
    Route::get('{sale}/edit', 'SalesController@edit')->name('sales.edit');
    Route::get('{clear', 'SalesController@clear')->name('sales.clear');
    Route::get('{sale}/delete', 'SalesController@destroy')->name('sales.delete');
    Route::post('update', 'SalesController@update')->name('sales.update');
    Route::post('store', 'SalesController@store')->name('sales.store');
    /**
     * ajax for get supplier
     */
    Route::get('get-sales', 'SalesController@getSales');
});
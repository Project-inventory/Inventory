<?php

Route::group(['prefix' => 'suppliers', 'namespace' => 'Supplier'], function (){

    Route::get('', 'SupplierController@index')->name('suppliers.index');
    Route::get('create', 'SupplierController@create')->name('suppliers.create');
    Route::get('{supplier}/edit', 'SupplierController@edit')->name('suppliers.edit');
    Route::get('{supplier}/show', 'SupplierController@show')->name('suppliers.show');
    Route::get('{supplier}/delete', 'SupplierController@destroy')->name('suppliers.delete');
    Route::post('update', 'SupplierController@update')->name('suppliers.update');
    Route::post('store', 'SupplierController@store')->name('suppliers.store');
    /**
     * ajax for get supplier
     */
    Route::get('get-suppliers', 'SupplierController@getSupplier');
});
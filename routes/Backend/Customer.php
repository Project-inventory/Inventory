<?php

Route::group(['prefix' => 'customers', 'namespace' => 'Customer'], function (){

    Route::get('', 'CustomerController@index')->name('customers.index');
    Route::get('create', 'CustomerController@create')->name('customers.create');
    Route::get('{customer}/edit', 'CustomerController@edit')->name('customers.edit');
    Route::get('{customer}/show', 'CustomerController@show')->name('customers.show');
    Route::get('{customer}/delete', 'CustomerController@destroy')->name('customers.delete');
    Route::post('update', 'CustomerController@update')->name('customers.update');
    Route::post('store', 'CustomerController@store')->name('customers.store');
    /**
     * ajax for get supplier
     */
    Route::get('get-customers', 'CustomerController@getCustomer');
});
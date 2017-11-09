<?php

Route::group(['prefix' => 'payments', 'namespace' => 'Payment'], function (){

    Route::get('', 'PaymentController@index')->name('payments.index');
    Route::get('create', 'PaymentController@create')->name('payments.create');
    Route::get('edit', 'PaymentController@edit')->name('payments.edit');
    Route::get('{fun_print', 'PaymentController@fun_print')->name('payments.fun_print');
    Route::get('{payment}/delete', 'PaymentController@destroy')->name('payments.delete');
    Route::post('update', 'PaymentController@update')->name('payments.update');
    Route::post('store', 'PaymentController@store')->name('payments.store');
});
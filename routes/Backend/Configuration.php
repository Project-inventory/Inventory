<?php

Route::group(['prefix' => 'configurations', 'namespace' => 'Configuration'], function (){
    /** Brand Route */
    Route::group(['prefix' => 'brands'], function (){
        Route::get('', 'BrandController@index')->name('brands.index');
        Route::get('create', 'BrandController@create')->name('brands.create');
        Route::get('{brand}/edit', 'BrandController@edit');
        Route::get('{brand}/delete', 'BrandController@destroy')->name('brands.delete');
        Route::post('update', 'BrandController@update');
        Route::post('store', 'BrandController@store')->name('brands.store');

        /** Ajax Request */
        Route::get('get-brands', 'BrandController@getBrands');
    });
    
    
    /** Category Route */
    Route::group(['prefix' => 'categories'], function (){
        Route::get('', 'CategoryController@index')->name('categories.index');
        Route::get('create', 'CategoryController@create')->name('categories.create');
        Route::get('{category}/edit', 'CategoryController@edit');
        Route::get('{category}/delete', 'CategoryController@destroy')->name('categories.delete');
        Route::post('update', 'CategoryController@update');
        Route::post('store', 'CategoryController@store')->name('categories.store');

        /** Ajax Request */
        Route::get('get-categories', 'CategoryController@getCategories');
    });
    
    /** Group Route */
    Route::group(['prefix' => 'groups'], function (){
        Route::get('', 'GroupController@index')->name('groups.index');
        Route::get('create', 'GroupController@create')->name('groups.create');
        Route::get('{group}/edit', 'GroupController@edit');
        Route::get('{group}/delete', 'GroupController@destroy')->name('groups.delete');
        Route::post('update', 'GroupController@update');
        Route::post('store', 'GroupController@store')->name('groups.store');

        /** Ajax Request */
        Route::get('get-groups', 'GroupController@getGroups');
    });
});
<?php

Route::group([
    'prefix' => 'admin-management',
    'as' => 'admins.',
], function () {

    Route::get('/', [
        'as' => 'lists',
        'uses' => 'AdminAccountController@lists'
    ]);

    Route::get('{admin}', [
        'as' => 'show',
        'uses' => 'AdminAccountController@show'
    ]);

    Route::get('{admin}/edit', [
        'as' => 'edit',
        'uses' => 'AdminAccountController@edit'
    ]);

    Route::put('{admin}/edit', [
        'as' => 'update',
        'uses' => 'AdminAccountController@update'
    ]);

    Route::delete('{admin}', [
        'as' => 'delete',
        'uses' => 'AdminAccountController@destroy'
    ]);

});

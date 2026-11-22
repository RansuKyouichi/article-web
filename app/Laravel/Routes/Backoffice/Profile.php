<?php

Route::group([
    'prefix' => 'profile',
    'as' => 'profile.',
], function () {

    Route::get('/', [
        'as' => 'details',
        'uses' => 'ProfileController@details'
    ]);

    Route::get('edit', [
        'as' => 'edit',
        'uses' => 'ProfileController@edit'
    ]);

    Route::put('edit', [
        'as' => 'update',
        'uses' => 'ProfileController@update'
    ]);

});

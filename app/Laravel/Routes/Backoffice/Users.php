
<?php

Route::group([
    'prefix' => 'user-management',
    'as' => 'users.',
], function () {

    Route::get('/', [
        'as' => 'lists',
        'uses' => 'UserAccountController@lists'
    ]);

    Route::get('create', [
        'as' => 'create',
        'uses' => 'UserAccountController@create'
    ]);

    Route::post('create', [
        'as' => 'store',
        'uses' => 'UserAccountController@store'
    ]);

    Route::get('{user}/edit', [
        'as' => 'edit',
        'uses' => 'UserAccountController@edit'
    ]);

    Route::put('{user}/edit', [
        'as' => 'update',
        'uses' => 'UserAccountController@update'
    ]);

    Route::get('{user}', [
        'as' => 'show',
        'uses' => 'UserAccountController@show'
    ]);

    Route::delete('{user}', [
        'as' => 'delete',
        'uses' => 'UserAccountController@destroy'
    ]);

});

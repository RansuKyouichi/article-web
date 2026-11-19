
<?php

Route::group([
    'as' => 'auth.',
    'middleware' => 'portal.guest',
], function () {

    Route::get('login', [
        'as' => 'login',
        'uses' => 'AuthenticationController@login'
    ]);

    Route::post('login', [
        'as' => 'authenticate',
        'uses' => 'AuthenticationController@authenticate'
    ]);

    Route::get('register', [
        'as' => 'register',
        'uses' => 'AuthenticationController@register'
    ]);

    Route::post('register', [
        'as' => 'store',
        'uses' => 'AuthenticationController@store'
    ]);

    Route::get('forgot-password', [
        'as' => 'forgot_password',
        'uses' => 'AuthenticationController@forgot_password'
    ]);

});

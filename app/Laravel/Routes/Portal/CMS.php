
<?php

Route::group([
    'prefix' => 'cms',
    'as' => 'cms.',
], function () {

    Route::get('home', [
        'as' => 'home',
        'uses' => 'CMS\HomeController@index'
    ]);

    Route::post('home', [
        'as' => 'store',
        'uses' => 'CMS\HomeController@store'
    ]);

    Route::get('about', [
        'as' => 'about',
        'uses' => 'CMS\AboutController@index'
    ]);

    Route::post('about', [
        'as' => 'store',
        'uses' => 'CMS\AboutController@store'
    ]);

    Route::get('articles', [
        'as' => 'articles',
        'uses' => 'CMS\ArticlesController@index'
    ]);

    Route::post('articles', [
        'as' => 'store',
        'uses' => 'CMS\ArticlesController@store'
    ]);

    Route::get('contact', [
        'as' => 'contact',
        'uses' => 'CMS\ContactController@index'
    ]);

    Route::post('contact', [
        'as' => 'store',
        'uses' => 'CMS\ContactController@store'
    ]);

});

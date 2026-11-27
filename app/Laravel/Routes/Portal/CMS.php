
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
        'as' => 'articles.store',
        'uses' => 'CMS\ArticlesController@store'
    ]);

    Route::get('articles/edit/{id}', [
        'as' => 'articles.edit',
        'uses' => 'CMS\ArticlesController@edit'
    ]);

    Route::post('articles/edit/{id}', [
        'as' => 'articles.update',
        'uses' => 'CMS\ArticlesController@update'
    ]);

    Route::post('articles/delete/{id}', [
        'as' => 'articles.destroy',
        'uses' => 'CMS\ArticlesController@destroy'
    ]);

    Route::post('articles/restore/{id}', [
        'as' => 'articles.restore',
        'uses' => 'CMS\ArticlesController@restore'
    ]);

    Route::get('contact', [
        'as' => 'contact',
        'uses' => 'CMS\ContactController@index'
    ]);

    Route::post('contact', [
        'as' => 'contact.store',
        'uses' => 'CMS\ContactController@store'
    ]);

});

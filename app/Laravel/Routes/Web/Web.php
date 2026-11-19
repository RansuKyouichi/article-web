<?php

    Route::get('/', [
        'as' => 'home',
        'uses' => 'MainController@index'
    ]);

    Route::get('about', [
        'as' => 'about',
        'uses' => 'MainController@about'
    ]);

    Route::get('articles', [
        'as' => 'articles',
        'uses' => 'MainController@articles'
    ]);

    Route::get('article/{id}', [
        'as' => 'article',
        'uses' => 'MainController@article'
    ]);

    Route::get('contact', [
        'as' => 'contact',
        'uses' => 'MainController@contact'
    ]);

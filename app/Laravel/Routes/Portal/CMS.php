
<?php

Route::group([
    'prefix' => 'cms',
    'as' => 'cms.',
], function () {

    Route::get('home', [
        'as' => 'home',
        'uses' => 'MainController@cms_home'
    ]);

    Route::get('about', [
        'as' => 'about',
        'uses' => 'MainController@cms_about'
    ]);

    Route::get('articles', [
        'as' => 'articles',
        'uses' => 'MainController@cms_articles'
    ]);

    Route::get('contact', [
        'as' => 'contact',
        'uses' => 'MainController@cms_contact'
    ]);

});

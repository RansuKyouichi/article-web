
<?php

Route::group([
    'prefix' => 'cms',
    'as' => 'cms.',
], function () {

    Route::get('home', [
        'as' => 'home',
        'uses' => 'CMSController@cms_home'
    ]);

    Route::get('about', [
        'as' => 'about',
        'uses' => 'CMSController@cms_about'
    ]);

    Route::get('articles', [
        'as' => 'articles',
        'uses' => 'CMSController@cms_articles'
    ]);

    Route::get('contact', [
        'as' => 'contact',
        'uses' => 'CMSController@cms_contact'
    ]);

});

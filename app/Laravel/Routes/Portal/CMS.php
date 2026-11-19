
<?php

Route::group([
    'prefix' => 'cms',
    'as' => 'cms.',
], function () {

    Route::get('home', [
        'as' => 'home',
        'uses' => 'MainController@cmsHome'
    ]);

    Route::get('about', [
        'as' => 'about',
        'uses' => 'MainController@cmsAbout'
    ]);

    Route::get('articles', [
        'as' => 'articles',
        'uses' => 'MainController@cmsArticles'
    ]);

    Route::get('contact', [
        'as' => 'contact',
        'uses' => 'MainController@cmsContact'
    ]);

});

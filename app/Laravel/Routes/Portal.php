<?php

use Illuminate\Support\Facades\Route;
$namespace = "App\Laravel\Controllers\Portal";

Route::group([
    'as' => "portal.",
    'namespace' => $namespace,
    'prefix' => "user",
    'middleware' => ["web"]
],function() {

    include_once app_path('Laravel/Routes/Portal/Auth.php');

        // Route::get('/', [
        //     'as' => 'dashboard',
        //     'uses' => 'MainController@index'
        // ]);

        // include_once app_path('Laravel/Routes/Portal/Profile.php');

        // include_once app_path('Laravel/Routes/Portal/CMS.php');

    Route::middleware('portal.auth')->group(function () {

        Route::get('/', [
            'as' => 'dashboard',
            'uses' => 'MainController@index'
        ]);

        include_once app_path('Laravel/Routes/Portal/Profile.php');

        include_once app_path('Laravel/Routes/Portal/CMS.php');

        Route::post('logout', [
            'as' => 'logout',
            'uses' => 'AuthenticationController@logout'
        ]);
    
    });

});

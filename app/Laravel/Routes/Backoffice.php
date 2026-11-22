<?php

use Illuminate\Support\Facades\Route;
$namespace = "App\Laravel\Controllers\Backoffice";

Route::group([
    'as' => "backoffice.",
    'namespace' => $namespace,
    'prefix' => "admin",
    'middleware' => ["web"]
],function() {

    include_once app_path('Laravel/Routes/Backoffice/Auth.php');
        
    // Route::get('/', [
    //         'as' => 'dashboard',
    //         'uses' => 'MainController@index'
    //     ]);

    //     include_once app_path('Laravel/Routes/Backoffice/Profile.php');

    //     include_once app_path('Laravel/Routes/Backoffice/Admins.php');

    //     include_once app_path('Laravel/Routes/Backoffice/Users.php');

    Route::middleware('backoffice.auth')->group(function () {

        Route::get('/', [
            'as' => 'dashboard',
            'uses' => 'MainController@index'
        ]);

        include_once app_path('Laravel/Routes/Backoffice/Profile.php');

        include_once app_path('Laravel/Routes/Backoffice/Admins.php');

        include_once app_path('Laravel/Routes/Backoffice/Users.php');


        Route::post('logout', [
            'as' => 'logout',
            'uses' => 'AuthenticationController@logout'
        ]);
    
    });

});

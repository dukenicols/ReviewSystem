<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/Route::get('register/confirm/{token}', 'Api\UserController@confirmEmail');

Route::group(['middleware' => 'web'] , function() {

    Route::group(['prefix' => 'api', 'namespace' => 'Api'], function()
    {

      Route::post('register', 'UserController@store');

      //Authentication
      Route::post('authenticate', 'AuthenticateController@authenticate');

      Route::resource('reviews', 'ReviewController',[ 'only' => [ 'index', 'store', 'destroy'] ]);
      Route::get('reviews/populars/{count?}', 'ReviewController@getPopulars');



      Route::group(['prefix' => 'review'] , function() {
        Route::get('{url}', 'ReviewController@get');
        Route::get('{id}/comments', 'CommentController@index');

      });

    Route::group(['middleware' => 'jwt.auth'], function() {
          Route::get('authenticate/user', 'AuthenticateController@getAuthenticatedUser');
          Route::post('review/{id}/comment', 'CommentController@store');
      });



    }); // api routes
});
    Route::get('/', function () {
        return view('front.index');
    });

    Route::get('/auth', function() {
        return view('front.auth.index');
    });
    Route::group(['prefix' => 'review'], function() {
      Route::get('{url}', 'ReviewController@index');
    });

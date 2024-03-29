<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*
 * Welcome route - link to any public API documentation here
 */
Route::get('/', function () {
    echo 'Welcome to our API';
});

/**
 * @var $api \Dingo\Api\Routing\Router
 */
$api = app('Dingo\Api\Routing\Router');
$api->version('v1', ['middleware' => ['api']], function ($api) {
    /*
     * Authentication
     */
    $api->group(['prefix' => 'auth'], function ($api) {
        $api->group(['prefix' => 'jwt'], function ($api) {
            $api->get('/token', 'App\Http\Controllers\Auth\AuthController@token');
        });
    });

    $api->get('/test', 'App\Http\Controllers\UserController@test');


    /*
     * Authenticated routes
     */
    $api->group(['middleware' => ['api.auth']], function ($api) {
        /*
         * Authentication
         */
        $api->group(['prefix' => 'auth'], function ($api) {
            $api->group(['prefix' => 'jwt'], function ($api) {
                $api->get('/refresh', 'App\Http\Controllers\Auth\AuthController@refresh');
                $api->delete('/token', 'App\Http\Controllers\Auth\AuthController@logout');
            });

            $api->get('/me', 'App\Http\Controllers\Auth\AuthController@getUser');
        });

        /*
         * Users
         */
        $api->group(['prefix' => 'users'], function ($api) {
            $api->get('/', 'App\Http\Controllers\UserController@getAll');
            $api->get('/{id}', 'App\Http\Controllers\UserController@get');
            $api->post('/', 'App\Http\Controllers\UserController@post');
            $api->put('/{id}', 'App\Http\Controllers\UserController@put');
            $api->patch('/{id}', 'App\Http\Controllers\UserController@patch');
            $api->delete('/{id}', 'App\Http\Controllers\UserController@delete');
        });

        /*
         * Articles
         */
//        $api->group(['prefix' => 'articles'], function ($api) {
//            $api->get('/', 'App\Http\Controllers\ArticleController@getAll');
//            $api->get('/{id}', 'App\Http\Controllers\ArticleController@get');
//            $api->post('/', 'App\Http\Controllers\ArticleController@post');
//            $api->patch('/{id}', 'App\Http\Controllers\ArticleController@patch');
//            $api->delete('/{id}', 'App\Http\Controllers\ArticleController@delete');
//        });

    });
});

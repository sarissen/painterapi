<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function() use ($app) {
    return "Lumen RESTful API for Painter App";
});


$router->get('api/v1/images','App\Http\Controllers\ImageController@index');

$router->get('api/v1/image/{id}','App\Http\Controllers\ImageController@getImage');

$router->post('api/v1/image','App\Http\Controllers\ImageController@createImage');

$router->put('api/v1/image/{id}','App\Http\Controllers\ImageController@updateImage');

$router->delete('api/v1/image/{id}','App\Http\Controllers\ImageController@deleteImage');

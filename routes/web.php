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

$router->get('/', function() {
    return "Lumen RESTful API for Painter App";
});


$router->get('api/v1/images','ImageController@index');

$router->get('api/v1/image/{id}','ImageController@getImage');

$router->post('api/v1/image','ImageController@createImage');

$router->delete('api/v1/image/{id}','ImageController@deleteImage');

$router->post('api/v1/image/data','ImageController@getImageData');

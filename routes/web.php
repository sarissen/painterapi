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

/**
 * Image routes
 */

$router->get('api/v1/images','ImageController@index');

$router->get('api/v1/image/{id}','ImageController@getImage');

// TODO use put instead of post for creating a new image
$router->post('api/v1/image','ImageController@createImage');

$router->delete('api/v1/image/{id}','ImageController@deleteImage');

// TODO use get instead of post for retrieving image data
$router->post('api/v1/image/data','ImageController@getImageData');

/**
 * Like routes
 */

$router->put('api/v1/image/{id}/like', 'LikeController@likeImage');

$router->delete('api/v1/image/{id}/like', 'LikeController@unlikeImage');

/**
 * Comment routes
 */

$router->put('api/v1/image/{id}/comment', 'CommentController@addComment');

$router->post('api/v1/comment/{id}', 'CommentController@editComment');

$router->delete('api/v1/comment/{id}', 'CommentController@deleteComment');

/**
 * User routes
 */

$router->get('api/v1/user','UserController@getCurrentUser');

// TODO use put instead of post for creating a new user
$router->post('api/v1/user','UserController@createUser');

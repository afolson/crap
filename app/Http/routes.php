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

$app->get('/', function () use ($app) {
    return $app->welcome();
});


$app->get('/users', 'UsersController@index');
$app->get('/users/{id}', 'UsersController@show');
$app->get('/users/{id}/checkins', 'UsersController@getCheckins');


$app->get('/places', 'PlacesController@index');
$app->post('/places', 'PlacesController@create');
$app->put('/places', 'PlacesController@update');
$app->get('/places/{id}', 'PlacesController@show');
$app->delete('/places/{id}', 'PlacesController@destroy');
$app->get('/places/{id}/checkins', 'PlacesController@getCheckins');

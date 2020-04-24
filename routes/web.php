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

$app->get('/ss', function () use ($app) {
    return $app->version();
});
$app->get('/searchAll', 'ExampleController@index');
$app->get('/searchJSON/{id}', 'ExampleController@show');
$app->post('/insertJSON', 'ExampleController@create');
$app->put('/editJSON/{id}', 'ExampleController@edit');
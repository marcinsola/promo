<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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
$router->group(['middleware' => ['auth', 'jsonRequest']], function ($router) {
    $router->post('/create', ['as' => 'create', 'uses' => 'ProductsController@create']);
    $router->get('/search', ['as' => 'search', 'uses' => 'ProductsController@search']);
});

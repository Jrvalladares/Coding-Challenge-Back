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

$router->get('/', function () use ($router) { return $router->app->version(); });

//Sustitutendo comando de artisan key:generate (Ya que solo necesito una cadena aleatoria de 32 caracteres para cifrado-hashing-passwords)
$router->get('/key-generate', function () { return Illuminate\Support\Str::random(32); });

//API Routes
$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('trucks',         ['uses' => 'TruckController@index']);
    $router->post('trucks',        ['uses' => 'TruckController@store']);
    $router->put('trucks/{id}',    ['uses' => 'TruckController@update']);
    $router->delete('trucks/{id}', ['uses' => 'TruckController@destroy']);
});

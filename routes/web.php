<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Models\Reminder;

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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function() use ($router){
    $router->get('/reminders','ReminderController@index');
    $router->post('/reminders','ReminderController@store');
    $router->put('/reminders/{id}','ReminderController@update');
    $router->delete('/reminders/{id}','ReminderController@destroy');
});

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
use Illuminate\Http\Request;

$router->get('/', function () use ($router) {
    return $router->app->version();
});

//$router->group(['middleware'=>['cors']], function() use($router){
    $router->get('/login/{user}/{pass}', 'AuthController@login');
    
//});
$router->get('/asistencia', 'AsistenciaController@index');
$router->get('/asistencia/{topic_id}', 'AsistenciaController@get');
$router->get('/asistenciaU/{user_id}', 'AsistenciaController@getU');
$router->post('/asistencia', 'AsistenciaController@create');
$router->delete('/asistencia/{user_id}/{topic_id}', 'AsistenciaController@destroy');
//$router->get('/asistencia/{user_id}', 'AsistenciaController@getA');


$router->post('/usuario', 'UserController@create');
$router->put('/topic/{id}', 'TopicController@update');
$router->group(['middleware'=>['auth']], function() use($router){
    $router->get('/usuario', 'UserController@index');
    $router->get('/usuario/{user}', 'UserController@get');
    
    $router->put('/usuario/{user}', 'UserController@update');
    $router->delete('/usuario/{user}', 'UserController@destroy');

    $router->get('/topic', 'TopicController@index');
    $router->get('/topic/{id}', 'TopicController@get');
    $router->post('/topic', 'TopicController@create');
    $router->delete('/topic/{id}', 'TopicController@destroy');

    $router->get('/post', 'PostController@index');
    $router->get('/post/{id_topic}', 'PostController@get');
    $router->post('/post', 'PostController@create');
    $router->put('/post/{id}', 'PostController@update');
    $router->delete('/post/{id}', 'PostController@destroy');
}
);

// $router->get('/test', ['middleware' => ['auth'], function (Request $request) use ($router) {
//     $user = $request->user();
//     return $user->user;
// }]);
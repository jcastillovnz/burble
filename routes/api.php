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


|Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

*/



Route::get('/proyecto/create/', 'ProyectoController@create');

Route::get('/usuario/create/', 'GestionController@createUser');

Route::get('/usuario/consulta_mail/', 'GestionController@monitor');

Route::get('/usuarios/consulta/', 'GestionController@list');

Route::get('/proyectos/', 'ProyectoController@list');



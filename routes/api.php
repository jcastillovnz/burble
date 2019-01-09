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

Route::get('/usuarios/delete/', 'GestionController@delete');


Route::get('/clientes/create/', 'ClienteController@create');






Route::get('/proyectos/', 'ProyectoController@list');


Route::get('/proyectos/principal', 'ProyectoController@listPrincipal');
Route::get('/proyectos/espera', 'ProyectoController@listEspera');
Route::get('/proyectos/tareas', 'ProyectoController@listTareas');


Route::get('/proyectos/principal/update/', 'ProyectoController@UpdateListaPrincipal');
Route::get('/proyectos/principal/add/', 'ProyectoController@AddListaPrincipal');



Route::get('/proyectos/espera/add/', 'ProyectoController@AddListaEspera');
Route::get('/lista_espera/delete/', 'ProyectoController@deleteListaEspera');
Route::get('/lista_principal/delete/', 'ProyectoController@deleteListaPrincipal');




Route::get('/lista_espera/update/', 'ProyectoController@updateListaEspera');

 



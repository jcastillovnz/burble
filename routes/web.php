<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Route::get('/', function () {
    return view('welcome');
});
*/


Auth::routes();
Route::group( ['middleware' => 'auth' ], function()
{


Route::get('/', 'HomeController@index')->name('/' ) ;
Route::get('/busqueda/', 'BusquedaController@index')->name('busqueda');

Route::get('/consulta/busqueda/', 'BusquedaController@busqueda');


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/mi-cuenta', 'CuentaController@index')->name('cuenta');
Route::get('/gestiones', 'GestionController@index')->name('gestiones');

Route::post('/send_foto/{id}', 'GestionController@foto');


Route::get('/nuevo_cliente', 'ClienteController@create');

Route::get('/cliente/{id}', 'ClienteController@detalle');

Route::get('/consulta/cliente/', 'ClienteController@GetCliente');




Route::get('/busqueda', 'BusquedaController@index');

Route::post('/detalle/tarea/send_imagen/{id}','ProyectoController@tarea_imagen');


Route::get('/detalle/{id}', 'ProyectoController@detalle');
Route::get('/proyecto/', 'ProyectoController@proyecto');
Route::get('/proyecto/paginar/tareas/', 'ProyectoController@proyectoTareas');
Route::get('/proyectos-archivados/', 'ProyectoController@registros');



// your routes here
});

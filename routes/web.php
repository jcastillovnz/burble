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


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::group( ['middleware' => 'auth' ], function()
{

Route::get('/busqueda/', 'busquedaController@index')->name('busqueda');

Route::get('/consulta/busqueda/', 'busquedaController@busqueda');




Route::get('/home', 'HomeController@index')->name('home');


Route::get('/mi-cuenta', 'CuentaController@index')->name('cuenta');
Route::get('/gestiones', 'GestionController@index')->name('gestiones');
Route::get('/nuevo_cliente', 'ClienteController@create');

Route::get('/nuevo_cliente', 'ClienteController@create');
Route::post('/send_foto/{id}', 'GestionController@foto');


Route::get('/busqueda', 'BusquedaController@index');




// your routes here
});

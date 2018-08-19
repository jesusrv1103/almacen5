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
Route::resource('home','HomeController');
Route::resource('almacenes','AlmacenController');
Route::resource('partidas','PartidaController');
Route::resource('direcciones','DireccionController');
Route::resource('proveedores','ProveedorController');
Route::resource('usuarios','UsuariosController');
Route::resource('articulos','ArticulosController');
Route::resource('partidas2','Partida2Controller');
Route::resource('reportes','ReporteController');
Route::resource('events','EventController');
Route::resource('solicitudes','SolicitudController');
Route::resource('solicitudes1','Solicitud1Controller');
Route::resource('entradas','EntradasController');

Route::resource('inventarios','InventarioController');

Route::get('verPartidas/{id}','PartidaController@verPartidas')->name('partidas.verPartidas');

Route::get('pdf','ArticulosController@pdf')->name('articulos.pdf');

Route::get('crearPartidas2/{id}','Partida2Controller@create1')->name('partidas2.create1');

Route::get('event2', 'EventController@index1');

Route::get('verSolicitudes/{id}','SolicitudController@verSolicitudes')->name('solicitud.verSolicitudes');

Route::get('pdf/{id}','SolicitudController@pdf')->name('solicitud.pdf');

Route::get('pdf','InventarioController@pdf')->name('inventario.pdf');

Route::get('adquisinet', function()
{
	return redirect()->away('http://adquisinet.sazacatecas.gob.mx/index.php
		');
});


Route::get('tipoUnidad/{id}', 'SolicitudController@tipoUnidad');



////////////////////
// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
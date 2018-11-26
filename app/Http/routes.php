<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// index page
Route::get('/', 'SeguimientoController@index');

// Rutas proyecto
Route::get('/proyecto','ProyectoController@index');
Route::post('/proyecto','ProyectoController@store');
Route::get('/proyecto/delete/{proyecto}','ProyectoController@destroy');

// Rutas usuario
Route::get('/usuario','UsuarioController@index');
Route::post('/usuario','UsuarioController@store');
Route::get('/usuario/delete/{usuario}','UsuarioController@destroy');

// Rutas para asignaciones
Route::get('/asignacion','AsignacionController@index');
Route::get('/asignacion/{proyecto}','AsignacionController@show');
Route::get('/asignacion/create/{proyecto}','AsignacionController@create');
Route::get('/asignacion/update/{proyecto}/{tarea}','AsignacionController@edit');
Route::post('/asignacion/create','AsignacionController@store');
Route::post('/asignacion/update','AsignacionController@update');
Route::get('/asignacion/delete/{proyecto}/{tarea}','AsignacionController@destroy');

Route::get('/gantt/{proyecto}','AsignacionController@ganttData');

// temporal routes
Route::get('/template',function(){
	return view('template');
});
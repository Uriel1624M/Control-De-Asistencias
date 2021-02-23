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
    return view('index');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('asistencia', 'AsistenciaController')->middleware('auth');
Route::resource('departamento', 'DepartamentoController')->middleware('auth');
Route::resource('cargos', 'CargoController')->middleware('auth');
Route::resource('sucursal', 'SucursalController')->middleware('auth');
Route::resource('personal', 'PersonalController')->middleware('auth');
Route::resource('rol', 'RolesController')->middleware('auth');

Route::resource('reportediario', 'ReporteAsistenciaDiariaController')
->middleware('auth');
Route::resource('reportequincenal', 'ReporteAsistenciaQuincealController')
->middleware('auth');

Route::resource('reportemensual', 'ReporteAsistenciaMensualController')
->middleware('auth');

Route::resource('usuarios', 'UsuariosController')->middleware('auth');

Auth::routes();


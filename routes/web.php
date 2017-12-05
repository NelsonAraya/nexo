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


Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::resource('nexo', 'NexoController');
Route::get('vol/busqueda', 'NexoController@busqueda');
Route::get('vol/busquedaActivo', 'NexoController@busquedaActivo');
Route::get('/home', 'HomeController@index')->name('home');

Route::post('nexo/{nexo}/asistencia', 'NexoController@usuario')->name('nexo.usuario');
Route::post('nexo/{nexo}/grupo', 'NexoController@grupo')->name('nexo.grupo');
Route::get('nexo/{nexo}/voluntarios', 'NexoController@voluntarios')->name('nexo.voluntarios');
Route::get('nexo/{nexo}/gruponexo', 'NexoController@grupoNexo')->name('nexo.gruponexo');
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
    return view('principal.home');
});
Route::resource('archivos', 'ProyectoController');
Route::post('aplicaciones/store','AplicacionController@store')->name('storeApps');
Route::get('aplicaciones','AplicacionController@index')->name('indexApps');
Route::get('aplicaciones/form','AplicacionController@create')->name('formApps');
Route::get('aplicaciones/{id}','ProyectoController@verAplicaciones')->name('verApps');
//Route::get('aplicaciones/form','ProyectoController@create')->name('verForm');
Route::get('aplicaciones/detalle/{id}','ProyectoController@detalle')->name('detalle');
Route::get('aplicaciones/grafica/{id}','ProyectoController@show')->name('verGrafica');
Route::get('aplicaciones/archivo/create/{id}','ProyectoController@create')->name('crear');

//Route::get('aplicaciones','AplicacionController@index')->name('aplicacion');

//Route::get('aplicaciones/form','AplicacionController@show')->name('openForm');
//Route::post('aplicaciones/form', 'AplicacionController@store');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

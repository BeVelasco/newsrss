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

Auth::routes(['reset' => false]);

Route::get('/', function () { return view('welcome');});
Route::get('/news','NewsController@news')->name('news');

Route::group(['middleware' => ['auth']], function() {
	Route::get('/home', 'HomeController@index')->name('home');

	Route::post('indicadoresGeneral', 'HomeController@indicadoresGeneral');
	Route::post('indicadoresPorPalabra', 'HomeController@indicadoresPorPalabra');
});

Route::get('tipo/{type}', 'SweetController@notification');


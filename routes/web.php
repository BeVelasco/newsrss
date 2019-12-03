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

//Route::get('/', function () { return view('/login');});
Route::get('/', function () { return redirect('login'); });


Route::group(['middleware' => ['auth']], function() {
    //Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/home', 'HomeController@monitor')->name('home');
    //Route::get('monitor', 'HomeController@monitor')->name('monitor');
    Route::get('monitor', 'HomeController@index')->name('monitor');
	Route::get('configuracion', 'HomeController@configuracion')->name('configuracion');

	Route::post('indicadoresGeneral', 'HomeController@indicadoresGeneral');
	Route::post('indicadoresGeneralFechas', 'HomeController@indicadoresGeneralFechas');
	Route::post('indicadoresPorPalabra', 'HomeController@indicadoresPorPalabra');

});

Route::get('tipo/{type}', 'SweetController@notification');


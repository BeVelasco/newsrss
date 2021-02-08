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
	Route::get('/home', 'HomeController@index')->name('home');
    Route::get('monitor', 'HomeController@monitor')->name('monitor');
    Route::get('estadisticas', 'HomeController@estadisticas')->name('estadisticas');
    Route::get('periodicos', 'HomeController@periodicos')->name('periodicos');
    Route::get('alertas', 'HomeController@alertas')->name('alertas');
    Route::get('semaforizacion', 'HomeController@semaforizacion')->name('semaforizacion');
    Route::get('configuracion', 'HomeController@configuracion')->name('configuracion');

    Route::get('pdfDiarios', 'HomeController@pdfDiarios')->name('pdfDiarios');

    Route::post('indicadoresMedios', 'HomeController@indicadoresMedios');
    Route::post('indicadoresLocales', 'HomeController@indicadoresLocales');
    Route::post('indicadoresNacionales', 'HomeController@indicadoresNacionales');

    Route::post('indicadoresGeneral', 'HomeController@indicadoresGeneral');
	Route::post('indicadoresGeneralFechas', 'HomeController@indicadoresGeneralFechas');
	Route::post('indicadoresPorPalabra', 'HomeController@indicadoresPorPalabra');
    Route::post('getContentHtml', 'HomeController@getContentHtml');
    Route::post('getContentHtmlP', 'HomeController@getContentHtmlP');
    Route::post('getContentHtmlPeriodicos', 'HomeController@getContentHtmlPeriodicos');
    Route::post('getPeriodicos', 'HomeController@getPeriodicos')->name('getPeriodicos');
});

Route::get('tipo/{type}', 'SweetController@notification');


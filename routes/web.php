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
    Route::post('indicadoresLocalesSemana', 'HomeController@indicadoresLocalesSemana');
    Route::post('indicadoresNacionales', 'HomeController@indicadoresNacionales');
    Route::post('indicadoresNacionalesSemanales', 'HomeController@indicadoresNacionalesSemanales');
    Route::post('indicadoresFacebook', 'HomeController@indicadoresFacebook');
    Route::post('indicadoresFacebookSemana', 'HomeController@indicadoresFacebookSemana');
    Route::post('indicadoresTweeter', 'HomeController@indicadoresTweeter');
    Route::post('indicadoresTweeterSemanales', 'HomeController@indicadoresTweeterSemanales');

    Route::post('indicadoresGeneral', 'HomeController@indicadoresGeneral');
	Route::post('indicadoresGeneralFechas', 'HomeController@indicadoresGeneralFechas');
	Route::post('indicadoresPorPalabra', 'HomeController@indicadoresPorPalabra');
    Route::post('getContentHtml', 'HomeController@getContentHtml');
    Route::post('getContentHtmlP', 'HomeController@getContentHtmlP');
    Route::post('getContentHtmlPeriodicos', 'HomeController@getContentHtmlPeriodicos');
    Route::post('getPeriodicos', 'HomeController@getPeriodicos')->name('getPeriodicos');
    Route::post('getFuentes', 'HomeController@getFuentes')->name('getFuentes');
    Route::post('getPalabras', 'HomeController@getPalabras')->name('getPalabras');
    Route::post('getFuentesId', 'HomeController@getFuentesId')->name('getFuentesId');
    Route::post('getPalabraId', 'HomeController@getPalabraId')->name('getPalabraId');
    Route::post('updFuente', 'HomeController@updFuente')->name('updFuente');
    Route::post('updPalabra', 'HomeController@updPalabra')->name('updPalabra');
    Route::post('setFuente', 'HomeController@setFuente')->name('setFuente');

    Route::post('getMedios', 'HomeController@getMedios')->name('getMedios');
    Route::post('getTipo', 'HomeController@getTipo')->name('getTipo');
    Route::post('getNoticiasMes', 'HomeController@getNoticiasMes')->name('getNoticiasMes');
    Route::post('getImg', 'HomeController@getImg')->name('getImg');

    Route::post('getUsuarios', 'HomeController@getUsuarios')->name('getUsuarios');
    Route::post('getUserId', 'HomeController@getUserId')->name('getUserId');
    Route::post('updUser', 'HomeController@updUser')->name('updUser');
    Route::post('setUser', 'HomeController@setUser')->name('setUser');

    Route::get('graficos', 'HomeController@graficos')->name('graficos');
});

Route::get('tipo/{type}', 'SweetController@notification');


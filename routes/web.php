<?php
use App\Http\Controllers\InfoVocacionalController;
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
    return view('plantilla');
});

Auth::routes();

//RUTAS QUE INCLUYEN TODOS LOS MÉTODOS HTTP
//Route::resource
//php artisan route:list

/*´PÁGINA PRINCIPAL*/
Route::resource('/', 'HomeController')->middleware('translate');
Route::resource('/home', 'HomeController')->middleware('translate');
Route::get('/home', 'HomeController@index')->name('home')->middleware('translate');
Route::get('/inicio', 'HomeController@index')->name('inicio')->middleware('translate');

/*MANEJADOR DE MULTILENGUAJE*/
Route::get('/lang/{language}', function ($language) {
    Session::put('language',$language);
    return redirect()->back();
})->name('language');

/*PÁGINA DETALLE DE INSTITUCION*/

Route::get('/detalleInstitucion/{idInstitucion}', 'InstitucionController@detalleInstitucion')->name('detalleInstitucion')->middleware('translate');

/*PÁGINA INFORMACION VOCACIONAL*/
Route::get('/descargar/{informacion_vocacional_id}','InfoVocacionalController@descargar')->name('descargar')->middleware('translate');
Route::get('/verMasInformacionVocacional/{informacion_vocacional_id}', 'InfoVocacionalController@verMasInformacionVocacional')->name('verMasInformacionVocacional')->middleware('translate');

/*PÁGINA COLEGIOS*/
Route::resource('/colegios', 'HomeController')->middleware('translate');
Route::get('/colegios', 'HomeController@colegios')->name('colegios')->middleware('translate');

/*PÁGINA LISTA DE INSTITUCIONES*/
Route::resource('/listaInstituciones', 'InstitucionController')->middleware('translate');
Route::get('/listaInstituciones', 'InstitucionController@listaInstituciones')->name('listaInstituciones')->middleware('translate');
Route::get('/FiltroCircuitos', 'InstitucionController@GetCircuitos')->name('FiltroCircuitos');

/*PÁGINA RESULTADOS DE BUSQUEDA*/
Route::get('/search', 'SearchController@index')->name('search');
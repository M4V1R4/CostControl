<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth/login');
});

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

Route::resource('transaccions','TransaccionController');
Route::resource('monedas','MonedaController');
Route::resource('cuentas','CuentaController');
Route::resource('categorias','CategoriaController');
Route::get('reporte1','ReportesController@index1');
Route::get('reporte2','ReportesController@index2');
Route::get('reporte3','ReportesController@index3');
Route::get('reporte4','ReportesController@index4');
Route::get('reporte5','ReportesController@index5');
Route::get('reporte6','ReportesController@index6');


Route::get('/reportes/{value}', 'ReportesController@reporte1')->name('reportes.reporte1');
Route::get('/transaccions/delete/{id}', 'TransaccionController@destroy')->name('transaccions.delete');
Route::get('/transaccions/{id}/edit', 'TransaccionController@edit')->name('transaccions.editar');
Route::put('/transaccions/{id}/update', 'TransaccionController@update')->name('transaccions.update');
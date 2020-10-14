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

Route::group(['middleware' => 'auth'], function () {
    

    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/home', 'HomeController@index')->name('home');

    Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function () {
        Route::resource('clientes', 'ClienteController');
        Route::resource('lojas', 'LojaController');
        Route::resource('inadimplencia', 'InadimplenciaController');
        Route::delete('inadimplenciaAnexoDestroy/{id}', 'InadimplenciaAnexoController@destroy')->name('inadimplenciaAnexoDestroy');
        Route::get('adimplentes', 'ClienteController@adimplente')->name('adimplentes');
        Route::get('inadimplentes', 'ClienteController@inadimplente')->name('inadimplentes');
        Route::resource('usuarios', 'UserController');
    });
});

Auth::routes();

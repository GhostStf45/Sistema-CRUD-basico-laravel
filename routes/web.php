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

Route::get('/', 'NotaController@index' )->name('inicio');
Route::post('/agregar', 'NotaController@store' )->name('store');
Route::get('/editar/{id}', 'NotaController@edit' )->name('edit');
Route::put('/update/{id}', 'NotaController@update' )->name('update');
Route::get('/delete/{id}', 'NotaController@delete' )->name('delete');

Auth::routes();


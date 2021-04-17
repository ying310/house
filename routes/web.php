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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/stock', 'stockController@index');

Route::get('/', 'houseController@index');
Route::get('/musicdownload', 'houseController@musicdownload');
Route::get('/avgle', 'avgleController@index');
Route::get('/avgle/form/{id}', 'avgleController@form');

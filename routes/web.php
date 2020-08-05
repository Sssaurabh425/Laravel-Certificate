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


Route::get('/tcpdf/{id?}', 'HomeController@index')->name('createPDF');
Route::get('/teacher', 'HomeController@teacher')->name('teacher');
Route::post('/saveteacher', 'HomeController@saveteacher')->name('saveteacher');

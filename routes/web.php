<?php

use Illuminate\Support\Facades\Auth;
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


Route::get('/tcpdf/{id?}', 'CertificateController@index')->name('createPDF');
Route::get('/certificates', 'CertificateController@certificates')->name('certificate');
Route::post('/savecertificate', 'CertificateController@savecertificate')->name('savecertificate');
Route::post('/savecourse', 'CertificateController@savecourse')->name('savecourse');
Route::post('/updatecourse', 'CertificateController@updatecourse')->name('updatecourse');
Route::get('/course', 'CertificateController@course')->name('course');
Route::post('/getcourse', 'CertificateController@getcourse')->name('getcourse');
Auth::routes();



Auth::routes();

Route::get('/home', 'CertificateController@index')->name('home');
Route::get('/', function () {
    return view('welcome');
})->name('');
Route::post('/registerteacher', 'TeacherController@registerteacher')->name('registerteacher');
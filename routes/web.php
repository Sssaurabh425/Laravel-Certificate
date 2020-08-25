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
Route::get('/teachers', 'TeacherController@teachers')->name('teachers');
Route::get('/contacts', 'ContactController@contacts')->name('contacts');
Route::post('/entitymail', 'ContactController@entitymail')->name('entitymail');
Route::post('/sendmail', 'ContactController@sendmail')->name('sendmail');
Route::get('/certificates', 'CertificateController@certificates')->name('certificate');
Route::post('/savecertificate', 'CertificateController@savecertificate')->name('savecertificate');
Route::post('/savecourse', 'CertificateController@savecourse')->name('savecourse');
Route::post('/updatecourse', 'CertificateController@updatecourse')->name('updatecourse');
Route::get('/course', 'CertificateController@course')->name('course');
Route::post('/getcourse', 'CertificateController@getcourse')->name('getcourse');

Auth::routes();
Route::get('/home', 'CertificateController@index')->name('home');
Route::get('/', 'HomeController@index')->name('index');

Route::post('/saveteacher', 'TeacherController@saveteacher')->name('saveteacher');
Route::post('/savecontact', 'HomeController@savecontact')->name('savecontact');
Route::post('/getcity', 'HomeController@getcity')->name('getcity');
Route::get('/registerteacher', 'TeacherController@registerteacher')->name('registerteacher');
Route::get('/termsandconditions', 'HomeController@termsandconditions')->name('termsandconditions');
Route::get('/privacypolicies', 'HomeController@privacypolicies')->name('privacypolicies');
Route::get('/faq', 'HomeController@faq')->name('faq');
Route::post('/updatecontactstatus', 'ContactController@updatecontactstatus')->name('updatecontactstatus');
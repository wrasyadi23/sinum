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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/organisasi/organisasi', 'OrganisasiController@index')->name('organisasi');
Route::post('/organisasi/organisasi-store', 'OrganisasiController@store')->name('organisasi.store');
Route::post('/organisasi/organisasi-store-downline', 'OrganisasiController@store_downline')->name('organisasi.store_downline');
Route::post('/organisasi/organisasi-import', 'OrganisasiController@import')->name('organisasi.import');
Route::post('/organisasi/organisasi-update/{id}', 'OrganisasiController@update')->name('organisasi.update');

Auth::routes();

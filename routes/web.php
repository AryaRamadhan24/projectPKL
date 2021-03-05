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

use App\Http\Controllers\kkController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/loginview', 'HomeController@loginview')->name('loginview');

// KTP
Route::get('/ktp', 'ktpController@index')->name('ktp');


// Kartu Keluarga
Route::get('/kartukeluarga', 'kkController@index' )->name('kk');


// Buku Nikah
Route::get('/bukunikah', 'bnController@index')->name('bn');

//Profile
Route::get('/editprofile', 'profileController@index')->name('editprofile');
Route::post('/updateprofile/{id}','profileController@update')->name('updateprofile');

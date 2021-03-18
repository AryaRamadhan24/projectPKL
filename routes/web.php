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

//register
Route::get('register/daftardesa/{id}', 'profileController@desa')->name('daftardesa');

//data json
Route::get('datakkjson/{id}', 'kkController@kk')->name('datakk');


// KTP
Route::get('/ktp', 'ktpController@index')->name('ktp');
Route::get('/ktp/tambah', 'ktpController@add')->name('addktpview');
Route::post('/addktp','ktpController@store')->name('addktp');
Route::get('/editktp/{id}', 'ktpController@edit')->name('editktp');
Route::post('/updatektp/{id}', 'ktpController@update')->name('updatektp');
Route::get('/deletektp/{id}', 'ktpController@destroy')->name('deletektp');
Route::post('/verifyktp/{id}', 'ktpController@verify')->name('verifyktp');


// Kartu Keluarga
Route::get('/kartukeluarga', 'kkController@index' )->name('kk');
Route::get('/kartukeluarga/tambah', 'kkController@add')->name('addkk');
Route::post('/kartukeluarga/addkk', 'kkController@store')->name('storekk');
Route::get('/editkk/{id}', 'kkController@edit')->name('editkk');
Route::post('/updatekk/{id}', 'kkController@update')->name('updatekk');
Route::get('/deletekk/{id}', 'kkController@destroy')->name('deletekk');
Route::post('/verifykk/{id}', 'kkController@verify')->name('verifykk');


// Buku Nikah
Route::get('/bukunikah', 'bnController@index')->name('bn');
Route::get('/bukunikah/tambah', 'bnController@add')->name('addbn');
Route::post('/bukunikah/addbn', 'bnController@store')->name('storebn');
Route::get('/editbn/{id}', 'bnController@edit')->name('editbn');
Route::post('/updatebn/{id}', 'bnController@update')->name('updatebn');
Route::get('/deletebn/{id}', 'bnController@destroy')->name('deletebn');
Route::post('/verifybn/{id}', 'bnController@verify')->name('verifybn');


//Profile
Route::get('/editprofile', 'profileController@index')->name('editprofile');
Route::post('/updateprofile/{id}','profileController@update')->name('updateprofile');


//user
Route::get('/useradmin', 'UserController@indexadmin')->name('useradmin');
Route::get('/userpetugas', 'UserController@indexpetugas')->name('userpetugas');
Route::get('/userwarga', 'UserController@indexuser')->name('userwarga');
Route::get('/createuser', 'UserController@create')->name('createuser');
Route::post('/adduser', 'UserController@store')->name('adduser');
Route::get('/deleteuser/{id}', 'UserController@destroy')->name('deleteuser');
Route::get('/edituser/{id}', 'UserController@edit')->name('edituser');
Route::post('/updateuser/{id}', 'UserController@update')->name('updateuser');

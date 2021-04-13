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
Route::get('dataktpjson/{id}', 'ktpController@ktp')->name('dataktp');
Route::get('databnjson/{id}', 'bnController@bn')->name('dataktp');


//gambar controller
Route::get('gambarkk/{id}', 'kkController@gambarkk')->name('gambarkk');
Route::get('gambarktp/{id}', 'ktpController@gambarktp')->name('gambarktp');
Route::get('gambarbnsuami/{id}', 'bnController@gambarbnsuami')->name('gambarbnsuami');
Route::get('gambarbnistri/{id}', 'bnController@gambarbnistri')->name('gambarbnistri');
Route::get('gambarExtra/{id}', 'menuController@gambarExtra')->name('gambarExtra');


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


//kecamatan
Route::get('/kecamatan', 'kecamatanController@index')->name('kecamatan');
Route::get('/addkecamatan', 'kecamatanController@create')->name('addkecamatan');
Route::post('/storekecamatan', 'kecamatanController@store')->name('storekecamatan');
Route::get('/deletekecamatan/{id}', 'kecamatanController@destroy')->name('deleteKecamatan');
Route::get('/editKecamatan/{id}', 'kecamatanController@edit')->name('editKecamatan');
Route::post('/updatekecamatan/{id}','kecamatanController@update')->name('updatekecamatan');


//desa
Route::get('/desa', 'desaController@index')->name('desa');
Route::get('/adddesa', 'desaController@create')->name('adddesa');
Route::post('/storedesa', 'desaController@store')->name('storedesa');
Route::get('/deletedesa/{id}', 'desaController@destroy')->name('deletedesa');
Route::get('/editdesa/{id}', 'desaController@edit')->name('editdesa');
Route::post('/updatedesa/{id}','desaController@update')->name('updatedesa');

//Menu
Route::get('/menu', 'menuController@index')->name('menu');
Route::get('/IndexMenu/{id}', 'menuController@indexMenu')->name('indexMenu');
Route::get('/IndexIndex/{id}', 'menuController@IndexIndex')->name('indexIndex');
Route::get('/addmenu', 'menuController@create')->name('addmenu');
Route::post('/storemenu', 'menuController@store')->name('storemenu');
Route::post('/storeIndex/{id}', 'menuController@storeIndex')->name('storeIndex');
Route::get('/deletemenu/{id}', 'menuController@destroy')->name('deletemenu');
Route::get('/deleteIndex/{id}', 'menuController@destroyIndex')->name('deleteIndex');
Route::get('/editmenu/{id}', 'menuController@edit')->name('editmenu');
Route::get('/editIndex/{id}', 'menuController@editIndex')->name('editIndex');
Route::post('/updatemenu/{id}','menuController@update')->name('updatemenu');
Route::post('/verifyIndex/{id}', 'menuController@verify')->name('verifyIndex');

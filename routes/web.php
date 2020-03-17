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

// Route::get('/welcome', function () {
//     return view('welcome', ['name' => 'MUSLIKHUL ADIB']);
// });

// Route::get('/portfolio', function () {
//     return view('portfolio');
// });

// Route::get('/about', function () {
//     return view('about');
// });

// Route::get('/contact', function () {
//     return view('contact');
// });

// Route::get('/', 'PagesController@home');


Route::get('/portfolio', 'PagesController@portfolio');

Route::get('/about', 'PagesController@about');

Route::get('/contact', 'PagesController@contact');




// Auth::routes();

Route::get('/', 'HomeController@index')->name('home')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

// Route::get('/layouts', '/layouts/app');

Route::get('/layouts', function () {
        return view('layouts/app');
    });

Route::group(['middleware' => ['auth', 'CekRole:admin']], function() {
    Route::get('/data_karyawan/create', 'karyawanController@create');
    Route::get('/edit_karyawan/{id}', 'karyawanController@edit');
    Route::patch('/data_karyawan/{id}', 'karyawanController@update');
    Route::post('/data_karyawan', 'karyawanController@store');
    Route::get('/data_karyawan/{id}', 'karyawanController@show');
    Route::delete('/data_karyawan/{id}', 'karyawanController@destroy');
});

Route::group(['middleware' => ['auth', 'CekRole:admin,karyawan']], function() {
    Route::get('/karyawan', 'karyawanController@index');
});  
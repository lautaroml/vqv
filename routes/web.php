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

Route::get('/', function () {
    //return view('welcome');
    dd($this->middleware('guest'));
    return view('auth.login');
});

Auth::routes();

Route::get('/inscripcion', 'HomeController@index')->name('home');
Route::get('/inscripcion/subscribe/{taller}', 'HomeController@subscribe')->name('subscribe');
Route::get('/inscripcion/remove/{taller}', 'HomeController@remove')->name('remove');

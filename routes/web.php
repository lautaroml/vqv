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
    //TODO:remove next line.
    return view('welcome');

    if ( auth()->guest() ) {
        return view('auth.login');
    } else {
        $talleres = \App\Taller::all();

        return view('home', compact('talleres'));
    }

});

// TODO: Uncomment this.
Auth::routes();
Route::get('/inscripcion', 'HomeController@index')->name('home');
Route::get('/inscripcion/subscribe/{taller}', 'HomeController@subscribe')->name('subscribe');
Route::get('/inscripcion/remove/{taller}', 'HomeController@remove')->name('remove');





Route::get('/prueba_mid', function () {
    $hoy = getdate();
    if ($hoy['mon'] == 9 && $hoy['mday'] == 30 && $hoy['hours'] >= 13) {
        dd(1);
        if ( auth()->guest() ) {
            return view('auth.login');
        } else {
            $talleres = \App\Taller::all();
            return view('home', compact('talleres'));
        }
    }
    return view('welcome');
});

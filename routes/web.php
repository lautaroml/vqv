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
    $hoy = getdate();
    if ($hoy['mon'] == 9 && $hoy['mday'] == 30 && $hoy['hours'] >= 19) {
        if ( auth()->guest() ) {
            return view('auth.login');
        } else {
            $talleres = \App\Taller::all();
            return view('home', compact('talleres'));
        }
    }
    return view('welcome');
});

// TODO: Uncomment this.
Auth::routes();
Route::get('/inscripcion', 'HomeController@index')->name('home');
Route::get('/inscripcion/subscribe/{taller}', 'HomeController@subscribe')->name('subscribe');
Route::get('/inscripcion/remove/{taller}', 'HomeController@remove')->name('remove');


Route::get('/home', function () {
    $hoy = getdate();
    if ($hoy['mon'] == 9 && $hoy['mday'] == 30 && $hoy['hours'] >= 19) {
        if ( auth()->guest() ) {
            return view('auth.login');
        } else {
            $talleres = \App\Taller::all();
            return view('home', compact('talleres'));
        }
    }
    return view('welcome');
});


Route::get('/prueba_mid', function () {
    $hoy = getdate();
    if ($hoy['mon'] == 9 && $hoy['mday'] == 30 && $hoy['hours'] >= 19) {
        if ( auth()->guest() ) {
            return view('auth.login');
        } else {
            $talleres = \App\Taller::all();
            return view('home', compact('talleres'));
        }
    }
    return view('welcome');
});

Route::get('/results', function () {
    if (auth()->user()->email == 'lautaroml@hotmail.com') {
        $talleres = \App\Taller::all();
        return view('results', compact('talleres'));
    }
    return redirect()->route('home');
});

Route::get('/results/{id}/view', function ($id) {
    if (auth()->user()->email == 'lautaroml@hotmail.com') {
        $taller = \App\Taller::find($id);
        return view('view', compact('taller'));
    }
    return redirect()->route('home');
});

Route::get('/results/{id}/report', function ($id) {

    if (auth()->user()->email == 'lautaroml@hotmail.com') {
        $taller = \App\Taller::find($id);

    $response = new \Symfony\Component\HttpFoundation\StreamedResponse(function() use($taller){

        $handle = fopen('php://output', 'w');

        fputcsv($handle, [
            'Nombre',
            'Apellido',
            'Documento',
            'Email',
            'Edad',
            'Nacimiento',
            'País',
            'Provincia',
            'Elenco'
        ], ',', '"');

        foreach ($taller->users->orderBy('last_name') as $user) {

            $state = '';
            if($user->state_id != 99) {
                $state = \App\State::find($user->state_id)->name;
            } else {
                $state = $user->other_state;
            }

            $elenco = '';
            if ($user->elenco) {
                $elenco = \App\Elenco::find($user->elenco)->name;
            }


            $row = [
                $user->first_name,
                $user->last_name,
                $user->document,
                $user->email,
                $user->age,
                explode('-', (string) $user->birthday)[2] . '/' .  explode('-', (string) $user->birthday)[1] . '/' . explode('-', (string) $user->birthday)[0],
                \App\Country::find($user->country_id)->name,
                $state,
                $elenco
            ];
            fputcsv($handle, $row, ',', '"');
        }
        fclose($handle);
    }, 200, [
        'Content-Type' => 'text/csv',
        'Content-Disposition' => 'attachment; filename="'.  $taller->name. '_'. time() .'.csv"',
    ]);
    return $response;
    }
    return redirect()->route('home');
});

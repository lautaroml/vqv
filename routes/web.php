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
    $emails = [
        'patapufete@gmail.com',
        'lautaroml@hotmail.com'
    ];

    if (in_array(auth()->user()->email, $emails)) {
        $talleres = \App\Taller::all();
        return view('results', compact('talleres'));
    }
    return redirect()->route('home');
});

Route::get('/results/{id}/view', function ($id) {

    $usuarios = \App\User::all();

    foreach ($usuarios as $usuario) {
        $usuario->first_name = ucwords($usuario->first_name);
        $usuario->last_name = ucwords($usuario->last_name);
        $usuario->save();
    }

    $emails = [
        'patapufete@gmail.com',
        'lautaroml@hotmail.com'
    ];

    if (in_array(auth()->user()->email, $emails)) {
        $taller = \App\Taller::find($id);
        return view('view', compact('taller'));
    }
    return redirect()->route('home');
});

Route::get('/results/{id}/report', function ($id) {

    $emails = [
        'patapufete@gmail.com',
        'lautaroml@hotmail.com'
    ];

    if (in_array(auth()->user()->email, $emails)) {
        $taller = \App\Taller::find($id);


       $usuarios = \App\User::all();

        foreach ($usuarios as $usuario) {
            $usuario->first_name = ucwords($usuario->first_name);
            $usuario->last_name = ucwords($usuario->last_name);
            $usuario->save();
        }

    $response = new \Symfony\Component\HttpFoundation\StreamedResponse(function() use($taller){

        $handle = fopen('php://output', 'w');

        fputcsv($handle, [
            'Apellido',
            'Nombre',
            'Documento',
            'Email',
            'Edad',
            'Nacimiento',
            'País',
            'Provincia',
            'Elenco'
        ], ',', '"');

        foreach ($taller->users->sortBy('last_name') as $user) {

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
                $user->last_name,
                $user->first_name,
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

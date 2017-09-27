<?php

namespace App\Http\Controllers;

use App\Taller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $talleres = Taller::all();

        return view('home', compact('talleres'));
    }

    public function subscribe(Taller $taller)
    {
        if (auth()->user()->tallers->count() >= 2) {
            return redirect()->back()->with([
                'message_error' => 'No podes inscribirte a más de dos Talleres'
            ]);
        }

        if (auth()->user()->tallers->count()) {
            $comp = $taller->compatibilities->pluck('external_taller_id')->toArray();
            if (! in_array(auth()->user()->tallers->first()->id, $comp)) {
                return redirect()->back()->with([
                    'message_error' => 'El taller: ' . $taller->name . ' no es compatible con: ' . auth()->user()->tallers->first()->name
                ]);
            }
        }

        if ($taller->users->count() < $taller->cupo) {
            $user = auth()->user();
            $taller->users()->sync([$user->id]);
            return redirect()->back()->with([
                'message_success' => 'Quedaste inscripto en el Taller: ' .$taller->name
            ]);
        }

        return redirect()->back()->with([
            'message_error' => 'El Taller: ' .$taller->name . ' no tiene mas cupo'
        ]);
    }

    public function remove(Taller $taller)
    {
        $user = auth()->user();
        $taller->users()->detach([$user->id]);
        return redirect()->back()->with([
            'message_success' => 'Has eliminado tu inscripción del Taller: ' .$taller->name
        ]);
    }
}

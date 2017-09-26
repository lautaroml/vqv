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

        foreach ($talleres as $taller) {
            $array = [];
            $array[] = $taller->day_one;
            $array[] = $taller->day_two;
            $array[] = $taller->day_three;
            dd($array);
        }


        return view('home', compact('talleres'));
    }
}

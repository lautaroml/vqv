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

    public function subscribe(Request $request)
    {
        dd($request->all());
    }

    public function remove(Request $request)
    {
        dd($request->all());
    }
}

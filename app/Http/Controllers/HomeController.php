<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;

use App\Models\Locadora;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $locadoras = Locadora::orderByRaw('id DESC')->where('usuario', Auth::user()->id)->get();
        
        return view('home')->with([
            'locadoras' => $locadoras
        ]);
    }
}

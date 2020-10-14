<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

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
        $cliente = Cliente::all();
        $adimplente = $this->adimplente()->count();
        $inadimplente = $this->inadimplente()->count();

        return view('home', compact('cliente', 'adimplente', 'inadimplente'));
    }

    private function adimplente(){
        $cliente = Cliente::all();
        $cliente = $cliente->filter(function ($item) {
            return $item->inadimplencias->count() == 0;
        });

        return $cliente;
       
    }

    private function inadimplente(){
        $cliente = Cliente::all();
        $cliente = $cliente->filter(function ($item) {
            return $item->inadimplencias->count() > 0;
        });

        return $cliente;
       
    }
}

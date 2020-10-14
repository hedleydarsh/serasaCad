<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Inadimplencia;

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

        $valorInadimplente = Inadimplencia::all()->sum('valor');

        return view('home', compact('cliente', 'adimplente', 'inadimplente', 'valorInadimplente'));
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

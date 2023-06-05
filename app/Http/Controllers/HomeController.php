<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Administrador;
use App\Models\Abogado;
use App\Models\Juicio;

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
        $administradores = Administrador::all();
        $abogados = Abogado::all();
        $clientes = Cliente::all();
        $juicios = Juicio::all();


        return view('dashboard',compact('administradores','abogados','clientes','juicios'));
    }

}


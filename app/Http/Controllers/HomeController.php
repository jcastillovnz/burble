<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Clientes;
use App\Contactos;





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

       $clientes=Clientes::all();
        return view('home', compact('clientes'));
    }
}

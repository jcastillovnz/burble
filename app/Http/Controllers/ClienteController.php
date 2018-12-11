<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Clientes;
use App\Contactos;






class ClienteController extends Controller
{
    //





    public function index()
    {
        return view('home');
    }


   public function create( Request $request )
    {


$cliente = new clientes();
$cliente->nombre=  $request->nombre;
$cliente->ciudad=$request->ciudad;
$cliente->pais=$request->pais;
$cliente->telefono=$request->telefono;
$cliente->save();



$contacto = new contactos();
$contacto->nombre=  $request->nombre;
$contacto->apellido=  $request->apellido;
$contacto->telefono=  $request->telefono;
$contacto->email=  $request->email;
$contacto->save();



return view('home');



    }











}

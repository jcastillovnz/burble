<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
    //





    public function index()
    {
        return view('home');
    }


   public function create()
    {


$cliente = new cliente();
$cliente->nombre=  $request->nombre;
$cliente->sitio_web=$request->sitio_web;
$cliente->pais=$request->pais;
$cliente->telefono=$request->telefono;
$cliente->save();



$cliente = new contacto();
$cliente->nombre=  $request->nombre;
$cliente->apellido=  $request->apellido;
$cliente->telefono=  $request->telefono;
$cliente->email=  $request->email;

$cliente->save();










return view('home');



    }











}

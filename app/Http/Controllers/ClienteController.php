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
$cliente->nombre=  $request->empresa;
$cliente->ciudad=$request->ciudad;
$cliente->sitio_web=$request->sitio_web;
$cliente->pais=$request->pais;
$cliente->telefono=$request->telefono;
$cliente->save();



$contacto = new contactos();
$contacto->nombre=  $request->nombre_contacto;
$contacto->apellido=  $request->apellido_contacto;
$contacto->telefono=  $request->telefono_contacto;
$contacto->email=  $request->email_contacto;
$contacto->save();



if ($contacto->save()==true) {
$data = "true";
return response()->json($data); 

}


else {

$data = "false";
return response()->json($data); 

}






    }











}

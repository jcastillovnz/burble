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
$cliente->nombre=  $request->nombre_empresa;
$cliente->ciudad=$request->ciudad;
$cliente->pais=$request->pais;
$cliente->telefono=$request->telefono;
$cliente->save();



$contacto = new contactos();
$contacto->nombre=  $request->nombre_contacto;
$contacto->apellido=  $request->apellido_contacto;
$contacto->telefono=  $request->telefono_contacto;
$contacto->email=  $request->email_contacto;
$contacto->save();



if ($cliente->save()==true) {

return view('home');


}






    }











}

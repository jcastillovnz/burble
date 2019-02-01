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


   public function detalle(Request $request)
    {
    




$cliente= Clientes::where('id', $request->id)->with('contactos')  ->first();

return view('layouts.clientes.cliente', compact('cliente'));



    }






    public function GetClientes()
    {

  $clientes = Clientes::orderBy('id', 'desc')->paginate(10);
return [
'pagination'=> [
'total'=> $clientes->total(),
'current_page'=> $clientes->currentPage(),
'per_page'=> $clientes->perPage(),
'last_page'=> $clientes->lastPage(),
'from'=> $clientes->firstItem(),
'to'=> $clientes->lastPage(),
],
'clientes'=> $clientes
];

}



  public function GetCliente(Request $request)
    {

 $cliente = clientes::where('id', $request->id)->with('contactos')->first();





return [
'contactos'=> $cliente->contactos ,
'cliente'=> $cliente
];





}



    public function borrar(Request $request)
    {
    

$cliente =Clientes::destroy($request->id);

return  $cliente;



    }






   public function create( Request $request )
    {


$cliente = new clientes();
$cliente->nombre=  $request->nombre;
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
$contacto->clientes_id=  $cliente->id;

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



   public function update( Request $request )
    {






$cliente = clientes::where('id', $request->id)->first();
$cliente->nombre=  $request->nombre;
$cliente->ciudad=$request->ciudad;
$cliente->sitio_web=$request->sitio_web;
$cliente->pais=$request->pais;
$cliente->telefono=$request->telefono;
$cliente->save();



if ($cliente->save()==true) {
$data = "true";
return response()->json($data); 

}


else {

$data = "false";
return response()->json($data); 

}
}















}

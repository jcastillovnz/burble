<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

use App\File;


class GestionController extends Controller
{
    //




   public function index()
    {

        return view('gestiones');


    }



  public function createUser( Request $request)
    {

 



$usuario = new User();
$usuario->foto=  $request->foto;
$usuario->name=  $request->nombre;
$usuario->apellido=  $request->apellido;
$usuario->email=  $request->email;
$usuario->password=  Hash::make($request->password);
$usuario->alias=  $request->alias;
$usuario->fecha_nacimiento=  $request->fecha_nacimiento;
$usuario->rango=  $request->rango;
$usuario->cuit=  $request->cuit;
$usuario->direccion=  $request->direccion;
$usuario->obra_social=  $request->obra_social;
$usuario->servicio_ambulancia=  $request->servicio_ambulancia;
$usuario->contacto_ambulancia=  $request->contacto_ambulancia;

$usuario->save();


if ($usuario->save()==true) {
$data = "true";
return response()->json($data); 

}

else {

$data = "false";
return response()->json($data); 

}








    }










}

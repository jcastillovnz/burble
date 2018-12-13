<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clientes;
use App\Contactos;
use App\Proyectos;





class ProyectoController extends Controller
{
    //








   public function create( Request $request )
    {







$proyecto= new Proyectos();
$proyecto->nombre=  $request->proyecto;
$proyecto->fecha_entrega=$request->fecha_entrega;
$proyecto->presupuesto=$request->presupuesto;
$proyecto->comentario=$request->comentario;
$proyecto->clientes_id=$request->cliente;
$proyecto->save();



if ($proyecto->save()==true) {
$data = "true";
return response()->json($data); 

}


else {

$data = "false";
return response()->json($data); 

}







    }





}

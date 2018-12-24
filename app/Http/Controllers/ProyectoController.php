<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clientes;
use App\Contactos;
use App\Proyectos;

use App\lista_principal;
use App\lista_espera;


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



$lista_espera = Lista_espera::where('id', 1);

dd($lista_espera->posision_0);
$lista_espera->posision_0;
$lista_espera->posision_1;
$lista_espera->posision_2;
$lista_espera->posision_3;








if ($proyecto->save()==true) {
$data = "true";
return response()->json($data); 

}


else {

$data = "false";
return response()->json($data); 

}





    }



public function list( Request $request )
    {

$proyectos = Proyectos::all();


return $proyectos;


    }






public function listPrincipal( Request $request )
    {


$lista_principal = Lista_principal::all();
return $lista_principal;




    }


public function listEspera( Request $request )
    {


$lista_espera = Lista_espera::all();
return $lista_espera;




    }














}

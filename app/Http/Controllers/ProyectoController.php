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



$lista_espera = Lista_espera::all();
$count = count($lista_espera);



if ($count==0)
{


for ($x = 0; $x <= 3; $x++) {


$lista_espera = new Lista_espera();

if ( $x == 0) {


$lista_espera->posicion = $proyecto->id;


}
else{
 
$lista_espera->posicion = null;

}

$lista_espera->save();

}

}

if ($count==4)
{

$this->ordenamiento ($proyecto, $lista_espera);
}




if ($proyecto->save()==true) {
$data = "true";
return response()->json($data); 

}
else {
$data = "false";
return response()->json($data); 
}


}

public function ordenamiento( $proyecto, $lista_espera ){




foreach ($lista_espera as $key => $data) {



if ($key == 3) {
$data->posicion = $proyecto->id;
}




}

$data->save();

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

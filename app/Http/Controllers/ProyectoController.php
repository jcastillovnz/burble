<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clientes;
use App\Contactos;
use App\Proyectos;
use App\Tareas;


use App\Lista_principal;
use App\Lista_espera;
use Auth;
use DB;

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

if ($count>=0 AND $count<=5 )
{
$lista_espera = new Lista_espera();
$lista_espera->proyectos_id = $proyecto->id;
$lista_espera->save();
}


if ($count==6 )
{
foreach ($lista_espera as $key => $value) {

	if ($key ==5) {
		$value->proyectos_id=$proyecto->id;
        $value->save();

	}

}

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

 public function deleteListaEspera(Request $request)
{


$lista_espera = Lista_espera::where('proyectos_id',$request->id)->delete();
return  $lista_espera;



}


 public function deleteListaPrincipal(Request $request)
{

$lista_principal = Lista_principal::where('proyectos_id',$request->id)->delete();
return  $lista_principal;




}





 public function AddListaPrincipal(Request $request)
{ 

$monitor = Lista_principal::where('proyectos_id', $request->id)->first();

if (isset($monitor)==false) {

$lista_principal = Lista_principal::all();
$count = count($lista_principal);

if ($count>=0 AND $count<=3 )
{
$lista_principal = new Lista_principal();
$lista_principal->proyectos_id = $request->id;
$lista_principal->save();
}

if ($count==4 )
{
foreach ($lista_principal as $key => $value) {

	if ($key ==3) {
		$value->proyectos_id=$request->id;
        $value->save();
	}
}
}






}




}

 public function AddListaEspera(Request $request)
{ 


$monitor = Lista_espera::where('proyectos_id', $request->id)->first();

if (isset($monitor)==false) {



$lista_espera = Lista_espera::all();
$count = count($lista_espera);

if ($count>=0 AND $count<=5 )
{
$lista_espera = new Lista_espera();
$lista_espera->proyectos_id = $request->id;
$lista_espera->save();
}
if ($count==6 )
{
foreach ($lista_espera as $key => $value) {

	if ($key ==5) {
		$value->proyectos_id=$request->id;
        $value->save();

	}
}
}


}



}








 public function UpdateListaEspera(Request $request)
{ 


$lista_espera = Lista_espera::all();
foreach ($lista_espera as $key => $value) {
$value->proyectos_id =  $request->nuevoOrden[$key];
$value->save();
}

return response()->json($lista_espera); 

}



 public function UpdateListaPrincipal(Request $request)
{ 


$lista_principal = Lista_principal::all();
foreach ($lista_principal as $key => $value) {
$value->proyectos_id =  $request->nuevoOrden[$key];
$value->save();
}

return response()->json($lista_principal); 

}






public function list( Request $request )
    {
/*
$proyectos = Proyectos::all();
return response()->json($proyectos); */
    }



public function listTareas( Request $request )
    {

$tareas = Tareas::all();
return response()->json($tareas);


    }





public function listPrincipal( Request $request )
    {


$lista_principal = DB::table('lista_principal')
->Join('proyectos', 'lista_principal.proyectos_id', '=', 'proyectos.id')
->leftJoin('clientes', 'proyectos.clientes_id', '=', 'clientes.id')
->select( 
'lista_principal.id',
'lista_principal.proyectos_id',     
'proyectos.nombre AS nombre_proyecto' , 
'proyectos.fecha_entrega' , 
'clientes.nombre AS nombre_empresa' , 
'proyectos.comentario'
)->orderBy('id', 'asc') ->get();



foreach ($lista_principal as $key => $item) {


echo "PADRE: $key";
echo "<br>";
$lista_tareas = [];
$tareas = Tareas::where('proyectos_id', $item->proyectos_id )->get();

foreach ($tareas as $key => $value) {

echo "KEY:   $key ";
echo $value->id; echo "  ".$value->nombre;
echo "<br>";
$lista_tareas = $value->nombre;

}


var_dump($lista_tareas);
}



//return response()->json($lista_principal); 



    }


public function listEspera( Request $request )
    {

$lista_espera = DB::table('lista_espera')

->Join('proyectos', 'lista_espera.proyectos_id', '=', 'proyectos.id')

->Join('clientes', 'proyectos.clientes_id', '=', 'clientes.id')
->select( 
'lista_espera.id',
'lista_espera.proyectos_id',     
'proyectos.nombre AS nombre_proyecto' , 
'proyectos.fecha_entrega' , 
'clientes.nombre AS nombre_empresa' , 
'proyectos.comentario'



)->orderBy('id', 'asc')

->get();;




return response()->json($lista_espera); 

    }












}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clientes;
use App\Contactos;
use App\Proyectos;

use App\lista_principal;
use App\lista_espera;
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

if ($count>=0 AND $count<=3 )
{
$lista_espera = new Lista_espera();
$lista_espera->proyectos_id = $proyecto->id;
$lista_espera->save();
}


if ($count==4 )
{
foreach ($lista_espera as $key => $value) {

	if ($key ==3) {
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
	
$lista_espera=Lista_espera::destroy($request->id);
return  $lista_espera;


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


$lista_espera = DB::table('lista_espera')
->Join('proyectos', 'lista_espera.proyectos_id', '=', 'proyectos.id')
->select( 
'lista_espera.id',   'lista_espera.posicion', 'proyectos.nombre AS nombre_proyecto')->get();

return $lista_espera;




    }














}

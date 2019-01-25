<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clientes;
use App\Contactos;
use App\Proyectos;
use App\Tareas;
use Session;

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

if ($count>=0 AND $count<=7 )
{
$lista_espera = new Lista_espera();
$lista_espera->proyectos_id = $proyecto->id;
$lista_espera->save();
}


if ($count==8 )
{
foreach ($lista_espera as $key => $value) {

	if ($key ==7) {
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

public function update(Request $request)
{


$proyecto= Proyectos::where('id', $request->id)->first();


$proyecto->nombre=  $request->nombre;


$proyecto->fecha_recepcion=$request->fecha_recepcion;

$proyecto->fecha_entrega=$request->fecha_entrega;

if (isset($request->presupuesto)) {
$proyecto->presupuesto=$request->presupuesto;
}
$proyecto->comentario=$request->comentario;

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




 public function detalle(Request $request)
{ 


$proyecto= Proyectos::where('id', $request->id)->with('clientes')  ->first();

return view('detalle', compact('proyecto'));


}



 public function proyecto(Request $request)
{ 


$proyecto = Proyectos::where('id', $request->id)->with('clientes')->first();
return response()->json($proyecto); 


}


 public function proyectoTareas(Request $request)
{ 


$tareas = Tareas::where('proyectos_id', $request->id)->with('users')
->orderBy('id', 'desc')->paginate(5);




return [
'pagination'=> [
'total'=> $tareas->total(),
'current_page'=> $tareas->currentPage(),
'per_page'=> $tareas->perPage(),
'last_page'=> $tareas->lastPage(),
'from'=> $tareas->firstItem(),
'to'=> $tareas->lastPage(),
],
'tareas'=> $tareas
];



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


$clear = Lista_espera::where('proyectos_id', $request->id)->delete();




}




}

 public function AddListaEspera(Request $request)
{ 


$monitor = Lista_espera::where('proyectos_id', $request->id)->first();

if (isset($monitor)==false) {



$lista_espera = Lista_espera::all();
$count = count($lista_espera);

if ($count>=0 AND $count<=7 )
{
$lista_espera = new Lista_espera();
$lista_espera->proyectos_id = $request->id;
$lista_espera->save();
}
if ($count==8 )
{
foreach ($lista_espera as $key => $value) {

	if ($key ==7) {
		$value->proyectos_id=$request->id;
        $value->save();

	}
}
}


}
$clear = Lista_principal::where('proyectos_id', $request->id)->delete();

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




public function update_tarea( Request $request )
    {




$tareas =Tareas::where('id', $request->id)->first();


$tareas->nombre=  $request->nombre;
$tareas->tipo=  $request->tipo;
$tareas->prioridad=$request->prioridad;
$tareas->estado=$request->estado;
$tareas->fecha_inicio=$request->fecha_inicio;
$tareas->fecha_termino=$request->fecha_termino;
$tareas->comentario=$request->comentario;

$tareas->save();

if ($tareas->save()==true) {
$data = "true";
return response()->json($data); 
}
else {
$data = "false";
return response()->json($data); 
}


    }







public function create_tarea( Request $request )
    {

$tareas = new Tareas();
$tareas->nombre=  $request->nombre_tarea;
$tareas->tipo=  $request->tipo_tarea;
$tareas->objetivo=  $request->objetivo_tarea;
$tareas->fecha_inicio=  $request->fecha_inicio;
$tareas->fecha_termino=  $request->fecha_termino;
$tareas->prioridad=$request->prioridad_tarea;
$tareas->estado=$request->estado_tarea;
$tareas->comentario=$request->comentario_tarea;
$tareas->users_id=$request->empleado_id;
$tareas->proyectos_id=$request->proyectos_id;
$tareas->save();

if ($tareas->save()==true) {
$data = "true";
return response()->json($data); 
}
else {
$data = "false";
return response()->json($data); 
}


    }



public function listTareas(  )
    {


$lista_principal = Lista_principal::all();



 $listado_tareas = array();


foreach ($lista_principal as $key => $item) {
$lista_tareas[$key] = array();




$tareas = Tareas::where('proyectos_id', $item->proyectos_id )
->with('users')

->orderBy('id', 'desc')->paginate(4);

$paginate = [
'pagination'=> [
'total'=> $tareas->total(),
'current_page'=> $tareas->currentPage(),
'per_page'=> $tareas->perPage(),
'last_page'=> $tareas->lastPage(),
'from'=> $tareas->firstItem(),
'to'=> $tareas->lastPage(),
],
'tareas'=> $tareas
];




foreach ($tareas as $i => $item) {


$tarea[$i] = array();

$tarea =  $item;


$lista_tareas[$key][$i] = $tarea ;


}
$listado_tareas = $lista_tareas;


}



return response()->json($listado_tareas );


    }


public function tarea_imagen($id, Request $request)
{


$tarea = Tareas::where('id', $id)->first();

if ($request->hasFile('imagen')===true ){
$file = $request->file('imagen');
$img = 'img_'.time().'.'.$file->getClientOriginalExtension();

$path = public_path().'/img/tareas/fotos/';
$file->move($path,$img );

$tarea->imagen =$img  ;
$tarea->save();

if ($tarea->save()==true) {
$data = $tarea->imagen;
return response()->json($data); 
}




}
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
return response()->json($lista_principal); 
 
 


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







 public function delete_tarea(Request $request)
{


$tareas = Tareas::where('id',$request->id)->delete();
return  $tareas;



}







 public function delete_proyecto(Request $request)
{


$proyecto = Proyectos::where('id',$request->id)->delete();
return  $proyecto;



}







}

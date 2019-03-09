<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clientes;
use App\Contactos;
use App\Proyectos;
use App\User;

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
$proyecto->fecha_recepcion=$request->fecha_recepcion;
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







public function update(Request $request)
{


$proyecto= Proyectos::where('id', $request->id)->first();


$proyecto->nombre=  $request->nombre;
$proyecto->prioridad=  $request->prioridad;
$proyecto->descripcion =  $request->descripcion;

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







public function registros(Request $request)
	{
	



return view('busqueda')->with('state', 'archivo');
}


 public function archivo(Request $request)
{ 


$proyectos = Proyectos::with('clientes')->with('tareas')->orderBy('id', 'desc')->paginate(8); ;


return [
'pagination'=> [
'total'=> $proyectos->total(),
'current_page'=> $proyectos->currentPage(),
'per_page'=> $proyectos->perPage(),
'last_page'=> $proyectos->lastPage(),
'from'=> $proyectos->firstItem(),
'to'=> $proyectos->lastPage(),
],
'proyectos'=> $proyectos
];



}





 public function todosProyectos(Request $request)
{ 


$proyectos = Proyectos::all();


return response()->json(count($proyectos)  ); 


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


$lista_espera = Lista_espera::where('clientes_id',$request->id)->delete();
return  $lista_espera;



}


 public function deleteListaPrincipal(Request $request)
{

$lista_principal = Lista_principal::where('proyectos_id',$request->id)->delete();
return  $lista_principal;




}

public function proyecto_imagen($id, Request $request)
{


$proyecto = Proyectos::where('id', $id)->first();

if ($request->hasFile('imagen')===true ){
$file = $request->file('imagen');
$img = 'img_'.time().'.'.$file->getClientOriginalExtension();

$path = public_path().'/img/proyectos/fotos/';
$file->move($path,$img );

$proyecto->img =$img  ;
$proyecto->save();

if ($proyecto->save()==true) {
$data = $proyecto->img;
return response()->json($data); 
}




}
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


$monitor = Lista_espera::where('clientes_id', $request->id )->first();

if ($monitor == null) {

$lista_espera = new Lista_espera();
$lista_espera->clientes_id =  $request->id;
$lista_espera->save();

return [
'estado'=>$lista_espera->save()
];

}

else {

return ['estado'=>'existe'];

}




}


 public function UpdateListaEspera(Request $request)
{ 


$lista_espera = Lista_espera::all();
foreach ($lista_espera as $key => $value) {
$value->clientes_id =  $request->nuevoOrden[$key];
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




$tarea =Tareas::where('id', $request->id)->with('users')->first();


$tarea->nombre=  $request->nombre;
$tarea->tipo=  $request->tipo;
$tarea->prioridad=$request->prioridad;
$tarea->estado=$request->estado;
$tarea->fecha_inicio=$request->fecha_inicio;
$tarea->fecha_termino=$request->fecha_termino;




$tarea->users_id=$request->empleado_id;
$tarea->comentario=$request->comentario;

$tarea->save();

if ($tarea->save()==true) {

$tarea =Tareas::where('id',$tarea->id)->with('users')->first();


return [
'tarea'=>$tarea,
'estado'=>$tarea->save()
];



}
else {
return [
'tarea'=>$tarea,
'estado'=>$tarea->save()
];
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


$lista_principal = Lista_principal::with(['proyectos', 'proyectos.clientes'])
->with(['proyectos.tareas' => function ($query) {
$query->latest()->limit(4);
}]) ->get() ;





$data_users = array();

foreach ($lista_principal  as $key => $lista) {

$data_user[$key] = array();

foreach ($lista->proyectos->tareas  as $i => $tarea) {


$users = User::where('id', $tarea->users_id)
 ->first() ;

 $data_user[$key][$i] = $users ;
/*
 echo "$users->name "; 
*/
}

$data_users = $data_user;

}


return response()->json (['lista_principal'=> $lista_principal ,
'users'=> $data_users ]) ;







    }


public function listEspera( Request $request ){




$lista_espera = Lista_espera::with(['clientes','clientes.proyectos','clientes.proyectos.tareas','clientes.proyectos.clientes' ])->get() ;
return response()->json (['lista_espera'=> $lista_espera]) ;

    


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

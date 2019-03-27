<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Image;
use Carbon\Carbon;
use App\File;
use App\lista_principal;
use App\lista_espera;
use App\Proyectos;
use App\Tareas;

use Session;
use Auth;
use DB;
class GestionController extends Controller
{
    //




   public function index()
    {

        return view('gestiones');


    }


public function delete(Request $request)
{



$usuario=User::destroy($request->id);

return  $usuario;



}


public function User(Request $request)
    {
 
$user = User::where('id', $request->id)->first();


$proyectos  = Proyectos::with('clientes')->whereHas('tareas', function($q) use ($request) 
{
$q->where('users_id', $request->id);
})->orderBy('id', 'desc')->paginate(2);




return $user;
}




 public  function GetProyectosxuser( Request $request )
    {


$proyectos  = Proyectos::with('clientes')->with('tareas') ->whereHas('tareas', function($q) use ($request) 
{
$q->where('users_id', $request->id);
})->orderBy('id', 'desc')->paginate(20);

return [
'pagination'=> [
'total'=> $proyectos->total(),
'current_page'=> $proyectos->currentPage(),
'per_page'=> $proyectos->perPage(),
'last_page'=> $proyectos->lastPage(),
'from'=> $proyectos->firstItem(),
'to'=> $proyectos->lastPage(),
],
'proyectos'=> $proyectos,
];





}


















public function todosUsuarios(Request $request)
{


$usuarios = User::orderBy('id', 'desc')->get() ;



return response()->json($usuarios); 





}





public function list(Request $request)
{


$usuarios = User::orderBy('id', 'desc')->paginate(15);

return [
'pagination'=> [
'total'=> $usuarios->total(),
'current_page'=> $usuarios->currentPage(),
'per_page'=> $usuarios->perPage(),
'last_page'=> $usuarios->lastPage(),
'from'=> $usuarios->firstItem(),
'to'=> $usuarios->lastPage(),
],
'usuarios'=> $usuarios
];








}



public function foto($id, Request $request)
{



$user = User::where('id', $id)->first();

if ($request->hasFile('foto')===true ){
$file = $request->file('foto');
$foto_user = 'user_picture_'.time().'.'.$file->getClientOriginalExtension();

$path = public_path().'/img/users/fotos/';
$file->move($path,$foto_user );

$user->foto =$foto_user  ;
$user->save();
if ($user->save()==true) {
$data = $foto_user ;
return response()->json($data); 
}

else {

$data = "false";
return response()->json($data); 

}




}








}



public function User_update(Request $request)
{



$user = User::where('id', $request->id)->first();

$user->name = $request->nombre;
$user->apellido = $request->apellido;
$user->cuit= $request->cuit;


if ($request->rango !=null ) {
$user->rango= $request->rango;
}

$user->direccion= $request->direccion;
$user->email= $request->email;

if ($request->password !=null ) {
$user->password= Hash::make($request->password);
}

$user->alias = $request->alias;
$user->fecha_nacimiento = $request->fecha_nacimiento;
$user->obra_social = $request->obra_social;
$user->servicio_ambulancia = $request->servicio_ambulancia;
$user->contacto_ambulancia = $request->contacto_ambulancia;
$user->save();


if ($user->save()==true) {



return [
'user'=> $user ,
'estado'=>'true'
];



}

else {

return [
'user'=> $user ,
'estado'=>'false'
];
}


}





public function monitor(Request $request)
    {

$mail = User::where('email', $request->mail)->first();

if ($mail == true){

$data = "true";
return response()->json($data); 

}

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

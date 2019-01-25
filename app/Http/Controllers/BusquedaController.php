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
class BusquedaController extends Controller
{


public function index(Request $request)
	{
	

$buscar =$request->busqueda;

 $proyectos = Proyectos::select()
->where('nombre','LIKE', '%'.$buscar.'%') 
->orderBy('id', 'desc')
->get();





return view('busqueda');
}



public function busqueda(Request $request)
{


$buscar =$request->busqueda;

$proyectos = Proyectos::with('tareas')->with('clientes')->whereHas('clientes', function ($query) use ($buscar) {
$query->where('nombre', 'like', '%'.$buscar.'%');
  })->orWhere('nombre','like', '%'.$buscar.'%')->orderBy('id', 'desc')->paginate(2);

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



    //
}

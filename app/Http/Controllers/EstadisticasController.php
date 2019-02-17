<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Image;
use Carbon\Carbon;
use App\File;
use App\Clientes;
use App\Contactos;
use App\Proyectos;
use App\User;

use App\Tareas;
use Session;
use Auth;
use DB;






class EstadisticasController extends Controller
{
    //




public function index()
{


//$date = Carbon::now();
//$date = $date->format('Y-m-d');




//dd($empleados[6]->tareas[0]);
//$empleados[6]->tareas[0]->fecha_termino->month
//dd($date);
//$proyectos = Proyectos::with('tareas')->get();


//$empleados = User::with('tareas')->get();
//dd(now()->month);
//$empleados = User::whereMonth('created_at', now()->month)->get();

$empleados = User::with(['tareas' => function ($query) {
$query->whereMonth('fecha_termino', '=', now()->month);
}])->get();


$proyectos =Proyectos::whereMonth('fecha_entrega', '=', now()->year)->get();

$enero =Proyectos::whereMonth('fecha_entrega', '=', now()->year)->get();

$febrero =Proyectos::whereMonth('fecha_entrega', '=', now()->year)->get();

$marzo =Proyectos::whereMonth('fecha_entrega', '=', now()->year)->get();

$abril =Proyectos::whereMonth('fecha_entrega', '=', now()->year)->get();




//dd($empleados[6]->tareas[0]->fecha_termino);

//dd(now()->year);






return view('estadisticas')->with(compact('empleados', 'proyectos'));





	# code...
}



public function DataEmpleado($value='')
{
	# code...
}











}

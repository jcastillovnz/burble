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



$empleados = User::with(['tareas' => function ($query) {
$query->whereYear('fecha_termino', '=', now()->year)
      ->whereMonth('fecha_termino', '=', now()->month);
  }])->get();


$proyectos =Proyectos::whereMonth('fecha_entrega', '=', now()->year)->get();


return view('estadisticas')->with(compact('empleados', 'proyectos'));


}



public function empleados(Request $request)
{




$empleados = User::with(['tareas' => function ($query) use ($request) {
$query->whereYear('fecha_termino', '=', $request->ano)
      ->whereMonth('fecha_termino', '=', $request->mes);
  }])->get();

return $empleados;


}


public function proyectos(Request $request)
{




$enero = Proyectos::whereYear('fecha_entrega',$request->ano )
->whereMonth('fecha_entrega', 1 )->get();

$febrero = Proyectos::whereYear('fecha_entrega',$request->ano )
->whereMonth('fecha_entrega', 2 )->get();

$marzo = Proyectos::whereYear('fecha_entrega',$request->ano )
->whereMonth('fecha_entrega', 3 )->get();


$abril = Proyectos::whereYear('fecha_entrega',$request->ano )
->whereMonth('fecha_entrega', 4 )->get();

$mayo = Proyectos::whereYear('fecha_entrega',$request->ano )
->whereMonth('fecha_entrega', 5 )->get();

$junio = Proyectos::whereYear('fecha_entrega',$request->ano )
->whereMonth('fecha_entrega', 6 )->get();

$julio = Proyectos::whereYear('fecha_entrega',$request->ano )
->whereMonth('fecha_entrega', 7 )->get();

$agosto = Proyectos::whereYear('fecha_entrega',$request->ano )
->whereMonth('fecha_entrega', 8 )->get();

$septiembre= Proyectos::whereYear('fecha_entrega',$request->ano )
->whereMonth('fecha_entrega', 9 )->get();


$octubre= Proyectos::whereYear('fecha_entrega',$request->ano )
->whereMonth('fecha_entrega', 10 )->get();

$noviembre= Proyectos::whereYear('fecha_entrega',$request->ano )
->whereMonth('fecha_entrega', 11 )->get();

$diciembre	= Proyectos::whereYear('fecha_entrega',$request->ano )
->whereMonth('fecha_entrega', 12 )->get();



return [
'enero'=> count($enero),
'febrero'=> count($febrero),
'marzo'=> count($marzo),
'abril'=> count($abril),
'mayo'=> count($mayo),
'junio'=> count($junio),
'julio'=> count($julio),
'agosto'=> count($agosto),
'septiembre'=> count($septiembre),
'octubre'=> count($octubre),
'noviembre'=> count($noviembre),
'diciembre'=> count($diciembre)
];





}









}

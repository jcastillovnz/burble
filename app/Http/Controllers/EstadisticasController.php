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



$empleados = User::with('tareas')->get();


$proyectos = Proyectos::with('tareas')->get();




return view('estadisticas')->with(compact('empleados', 'proyectos'));





	# code...
}



public function DataEmpleado($value='')
{
	# code...
}











}

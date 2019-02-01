<?php

namespace App\Http\Controllers;


use App\Clientes;
use App\Contactos;

use Illuminate\Http\Request;

class ContactoController extends Controller
{
    //






   public function create( Request $request )
    {




$contacto = new contactos();
$contacto->nombre=  $request->nombre_contacto;
$contacto->apellido=  $request->apellido_contacto;
$contacto->telefono=  $request->telefono_contacto;
$contacto->email=  $request->email_contacto;
$contacto->clientes_id=  $request->id;

$contacto->save();



$data = "true";
return response()->json($data); 


}




    public function delete(Request $request)
    {
    

$contacto =contactos::destroy($request->id);

return  $contacto;



    }








}

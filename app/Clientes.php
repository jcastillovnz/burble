<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    //





 protected $fillable = [
        'nombre'

    ];



public function proyectos()
{
    return $this->hasMany('App\Proyectos');

}


public function lista_espera()
{
   return $this->hasOne('App\Lista_espera');

}



public function contactos()
{
    return $this->hasMany('App\Contactos');
    
}










}

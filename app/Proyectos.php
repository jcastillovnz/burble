<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyectos extends Model
{
    //
use \Staudenmeir\EloquentEagerLimit\HasEagerLimit;



 protected $fillable = [
        'nombre'

    ];



public function tareas()
{
    return $this->hasMany('App\Tareas');

}



public function lista_principal()
{
    return $this->hasOne('App\Lista_principal');

}



/*
public function lista_espera()
{
    return $this->hasOne('App\Lista_espera');

}
*/


public function clientes()
{
    return $this->belongsTo('App\Clientes');
}












}

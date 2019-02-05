<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Tareas extends Model
{
    //

use \Staudenmeir\EloquentEagerLimit\HasEagerLimit;

 protected $fillable = [
        'nombre'

    ];



public function proyectos()
{
  return $this->belongsTo('App\Proyectos');
}


/*
public function users()
{
    return $this->belongsTo('App\User');
}
*/



public function users()
{
    return $this->belongsTo('App\User');
}





public function imagenes()
{
    return $this->hasOne('App\Imagenes');

}
















}

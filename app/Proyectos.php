<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyectos extends Model
{
    //




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




public function clientes()
{
    return $this->belongsTo('App\Clientes');
}












}

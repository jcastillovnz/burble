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

/*
protected $dates = [
    'fecha_recepcion','fecha_entrega',
   
];


protected $casts = [
    'fecha_recepcion' => 'date:Y-m-d',
    'fecha_entrega' => 'date:Y-m-d',

];

*/


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

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

    /*
protected $dates = [
    'fecha_inicio','fecha_termino',
];
*/

/*
protected $casts = [
    'fecha_termino' => 'date:Y-m-d',
    'fecha_inicio' => 'date:Y-m-d',
    'created_at' => 'datetime:Y-m-d h:i',
    'updated_at' => 'datetime:Y-m-d h:i',

];

*/



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

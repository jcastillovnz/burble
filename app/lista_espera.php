<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lista_espera extends Model
{

use \Staudenmeir\EloquentEagerLimit\HasEagerLimit;
public $table = "lista_espera";


public function clientes()
{
    return $this->belongsTo('App\Clientes');
}






    //
}

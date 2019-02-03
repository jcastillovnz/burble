<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lista_principal extends Model
{
    //

public $table = "lista_principal";







public function proyectos()
{
    return $this->belongsTo('App\Proyectos');
}







}

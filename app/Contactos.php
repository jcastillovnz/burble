<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contactos extends Model
{
    //



public function clientes()
{
  return $this->belongsTo('App\clientes');
}








}

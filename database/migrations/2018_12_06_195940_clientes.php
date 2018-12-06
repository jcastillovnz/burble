<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class clientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //


 Schema::create('clientes', function (Blueprint $table) {
 $table->increments('id');

          
            $table->string('nombre');
             $table->string('apellido');
            $table->string('sitio_web');
            $table->string('ciudad');
            $table->string('pais');
           $table->string('telefono');


        });





    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

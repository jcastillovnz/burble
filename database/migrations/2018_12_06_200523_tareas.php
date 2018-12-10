<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tareas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {



 Schema::create('tareas', function (Blueprint $table) {
             $table->increments('id');
             $table->string('nombre');
            $table->string('tipo');
             $table->string('prioridad');
            $table->string('estado');
            $table->string('comentario');
        });

        //
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

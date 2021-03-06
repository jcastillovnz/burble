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
             $table->string('imagen')->nullable();      
             $table->string('nombre')->nullable();
             $table->string('objetivo')->nullable();
             $table->date('fecha_inicio')->nullable();
             $table->date('fecha_termino')->nullable();
             $table->string('tipo')->nullable();
             $table->string('prioridad')->nullable();
             $table->string('estado')->nullable();
             $table->longText('comentario')->nullable();
             $table->integer('proyectos_id')->unsigned()->nullable() ;
             $table->foreign('proyectos_id')->references('id')->on('proyectos')  ->onupdate('cascade') ->onDelete('cascade')   ;




$table->integer('users_id')->unsigned()->nullable() ;
$table->foreign('users_id')->references('id')->on('users')  ->onupdate('cascade') ->onDelete('cascade')   ;







$table->timestamps();











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

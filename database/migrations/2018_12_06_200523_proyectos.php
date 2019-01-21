<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Proyectos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

 Schema::create('proyectos', function (Blueprint $table) {
             $table->increments('id');
             $table->string('nombre')->nullable();
             $table->string('estado')->nullable();
             $table->string('fecha_recepcion')->nullable();
             $table->string('fecha_entrega')->nullable();
             $table->string('presupuesto')->nullable();
             $table->longText('comentario')->nullable();





$table->integer('clientes_id')->unsigned()->nullable() ;
$table->foreign('clientes_id')->references('id')->on('clientes')  ->onupdate('cascade') ->onDelete('cascade')   ;
$table->timestamps();












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

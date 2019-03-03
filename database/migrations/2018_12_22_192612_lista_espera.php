<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class listaEspera extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
 Schema::create('lista_espera', function (Blueprint $table) {
$table->increments('id');
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

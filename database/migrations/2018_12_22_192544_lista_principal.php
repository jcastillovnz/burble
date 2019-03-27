<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class listaPrincipal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //


 Schema::create('lista_principal', function (Blueprint $table) {
$table->increments('id');
$table->integer('proyectos_id')->unsigned()->nullable() ;
$table->foreign('proyectos_id')->references('id')->on('proyectos')  ->onupdate('cascade') ->onDelete('cascade')   ;
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

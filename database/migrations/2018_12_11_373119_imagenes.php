<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Imagenes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
 Schema::create('imagenes', function (Blueprint $table) {
             $table->increments('id');
             $table->string('img')->nullable();
             $table->string('tipo')->nullable();
            $table->string('comentario')->nullable();
        
 $table->integer('tareas_id')->unsigned()->nullable() ;
$table->foreign('tareas_id')->references('id')->on('tareas')  ->onupdate('cascade') ->onDelete('cascade')   ;
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

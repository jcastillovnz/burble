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
             $table->increments('id')->nullable();
             $table->string('nombre')->nullable();
             $table->string('prioridad')->nullable();
            $table->string('estado')->nullable();
            $table->string('comentario')->nullable();

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

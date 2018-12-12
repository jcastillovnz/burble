<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Estadisticas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {



 Schema::create('estadisticas', function (Blueprint $table) {
             $table->increments('id');
             $table->string('produccion_mensual')->nullable();
             $table->string('produccion_empleado')->nullable();
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

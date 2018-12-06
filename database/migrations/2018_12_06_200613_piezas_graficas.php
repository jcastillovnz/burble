<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PiezasGraficas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

 Schema::create('piezas_graficas', function (Blueprint $table) {
             $table->increments('id');
             $table->string('tipo');
             $table->string('cantidad');
            $table->string('comentario');
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

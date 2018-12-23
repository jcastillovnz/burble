<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PosicionEspera extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
 Schema::create('posicion_espera', function (Blueprint $table) {
             $table->increments('id');
             $table->string('posicion_0')->nullable();
             $table->string('posicion_1')->nullable();
             $table->string('posicion_2')->nullable();
             $table->string('posicion_3')->nullable();
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

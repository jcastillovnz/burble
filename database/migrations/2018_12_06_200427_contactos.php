<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Contactos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

 Schema::create('contactos', function (Blueprint $table) {
 $table->increments('id');

          
            $table->string('nombre')->nullable();
             $table->string('apellido')->nullable();
            $table->string('email')->nullable();
            $table->string('ciudad')->nullable();
           $table->string('telefono')->nullable();
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

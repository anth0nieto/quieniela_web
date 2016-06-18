<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuinielasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('quinielas', function (Blueprint $table) {
          $table->increments('id')->unique();
          $table->string('nombre');
          $table->float('costo');
          $table->integer('usuarios');
          $table->integer('ganadores');
          $table->date('f_inicio');
          $table->date('f_oferta');
          $table->date('f_inscripcion');
          $table->string('torneo_liga');
          $table->rememberToken();
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
        Schema::drop('quinielas');
    }
}

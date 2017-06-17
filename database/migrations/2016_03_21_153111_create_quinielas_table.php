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
          $table->string('tipo_quiniela');
          $table->float('costo');
          $table->integer('usuarios');
          $table->integer('ganadores');
          $table->date('fecha_inicio');
          $table->date('fecha_finalizacion');
          $table->integer('finalizado')->default(0);
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

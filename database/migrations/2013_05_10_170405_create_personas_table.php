<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->string('nombre');
            $table->string('apellido');
            $table->string('cedula');
            $table->string('telefono');
            $table->string('ubicacion');
            $table->date('fecha_nacimiento');
            $table->string('email');
            $table->integer('creditoDisponible')->unsigned();
            $table->integer('creditoPendiente')->unsigned();
            $table->integer('edad')->unsigned();
            $table->primary('email');
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
        Schema::drop('personas');
    }
}

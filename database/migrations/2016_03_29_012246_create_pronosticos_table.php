<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePronosticosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pronosticos', function (Blueprint $table) {
            $table->increments('id_pronostico')->unique();
            $table->string('id_partido');
            $table->string('id_quiniela');
            $table->string('goles_local');
            $table->string('goles_visitante');
            $table->string('id_user');
            $table->integer('fase');
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
        Schema::drop('pronosticos');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultadoAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resultado_admins', function (Blueprint $table) {
            $table->string('id_partido')->unique();
            $table->integer('goles_local');
            $table->integer('goles_visitante');
            $table->integer('id_quiniela');
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
        Schema::drop('resultado_admins');
    }
}

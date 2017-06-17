<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('username');
            $table->string('email');
            $table->string('cedula');
            $table->integer('montoSolicitado')->unsigned();
            $table->string('banco');
            $table->string('nroCuenta');
            $table->date('fechaSolicitud');
            $table->date('fechaApro');
            $table->integer('status')->default(0)->unsigned();
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
        Schema::drop('pagos');
    }
}

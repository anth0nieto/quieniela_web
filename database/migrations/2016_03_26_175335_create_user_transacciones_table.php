<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTransaccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_transacciones', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('id_quiniela');
            $table->string('username');
            $table->string('tipo_transaccion');
            $table->string('banco_emisor');
            $table->string('nro_cuenta');
            $table->string('monto');
            $table->date('fecha');
            $table->string('nro_transaccion');
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
        Schema::drop('user_transacciones');
    }
}

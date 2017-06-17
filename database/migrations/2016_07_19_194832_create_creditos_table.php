<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('creditos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->integer('creditoPendiente')->unsigned();
            $table->integer('ultimosCuatro')->unsigned();
            $table->string('banco');
            $table->integer('status')->default(0);
            $table->date('fecha');
            $table->date('fechaApro');
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
        Schema::drop('creditos');
    }
}

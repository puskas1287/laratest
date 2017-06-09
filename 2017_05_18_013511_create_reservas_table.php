<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('materia_id')->unsigned();
            $table->integer('aula_id')->unsigned();
            $table->integer('turno_id')->unsigned();
            $table->date('fecha_solicitada');
            $table->integer('data_id')->unsigned();
            $table->integer('cpu');
            $table->integer('teclado');
            $table->integer('mouse');
            $table->integer('parlantes');
            $table->integer('lector');
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
        Schema::dropIfExists('reservas');
    }
}

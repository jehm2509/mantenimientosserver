<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddComputadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('computadores', function (Blueprint $table) {
            $table->increments('idComputador');
            $table->string('tipoequipo', 30);
            $table->string('marca', 30);
            $table->string('modelo', 30);
            $table->string('serial', 30)->unique();
            $table->string('placa', 10)->unique();
            $table->integer('idUsuario')->unsigned();


            $table->foreign('idUsuario')
                ->references('idUsuario')->on('usuarios')
                ->onDelete('cascade');


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
        Schema::dropIfExists('computadores');
    }
}

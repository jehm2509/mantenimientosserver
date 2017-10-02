<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('idUsuario');
            $table->string('nombres', 40);
            $table->string('apellidos', 40);
            $table->string('cedula', 20)->unique();
            $table->string('cargo', 40);
            $table->string('telefono', 20); //Colocarlo nullable 
            $table->string('celular', 10); //Colocarlo nullable
            $table->integer('idArea')->unsigned();

            $table->foreign('idArea')
                ->references('idArea')->on('areas');
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
        Schema::dropIfExists('usuarios');
    }
}

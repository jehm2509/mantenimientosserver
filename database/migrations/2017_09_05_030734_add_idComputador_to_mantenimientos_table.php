<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIdComputadorToMantenimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mantenimientos', function (Blueprint $table) {
            
            $table->integer('idComputador')->unsigned();
            $table->foreign('idComputador')
                ->references('idComputador')->on('computadores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mantenimientos', function (Blueprint $table) {
            //
        });
    }
}

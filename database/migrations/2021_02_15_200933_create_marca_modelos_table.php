<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarcaModelosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marca_modelos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('talla');
            $table->string('color');

            $table->integer('idMarca')->unsigned();
            $table->integer('idModelo')->unsigned();

            $table->foreign('idMarca')->references('id')->on('marcas');
            $table->foreign('idModelo')->references('id')->on('modelos');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marca_modelos');
    }
}

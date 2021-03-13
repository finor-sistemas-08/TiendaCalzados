<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalzadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calzados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->float('precioVenta');
            $table->float('precioCompra');
            $table->string('imagen');

            $table->integer('idCategoria')->unsigned();
            $table->integer('idMarcaModelo')->unsigned();
            $table->integer('idTipoCalzado')->unsigned();

            $table->foreign('idCategoria')->references('id')->on('categorias')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idMarcaModelo')->references('id')->on('marca_modelos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idTipoCalzado')->references('id')->on('tipo_calzados')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calzados');
    }
}

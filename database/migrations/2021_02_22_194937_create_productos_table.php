<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->float('precioVenta');
            $table->float('precioCompra');
            $table->string('imagen');

            $table->integer('idCategoria')->unsigned();
            $table->integer('idMarcaModelo')->unsigned();
            $table->integer('idTipoCalzado')->unsigned();

            $table->foreign('idCategoria')->references('id')->on('categorias');
            $table->foreign('idMarcaModelo')->references('id')->on('marca_modelos');
            $table->foreign('idTipoCalzado')->references('id')->on('tipo_calzados');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleCompraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_compra', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cantidad')->unsigned();
            $table->float('subTotal');

            $table->integer('idCalzadoAlmacen')->unsigned();
            $table->foreign('idCalzadoAlmacen')->references('id')->on('calzado_almacen')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('idNotaCompra')->unsigned();
            $table->foreign('idNotaCompra')->references('id')->on('nota_compra')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_compra');
    }
}

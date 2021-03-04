<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductoAlmacenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto_almacen', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('stock')->unsigned();

            $table->integer('idProducto')->unsigned();
            $table->integer('idAlmacen')->unsigned();

            $table->foreign('idProducto')->references('id')->on('productos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idAlmacen')->references('id')->on('almacenes')->onDelete('cascade')->onUpdate('cascade');

        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('producto_almacen');
    }
}

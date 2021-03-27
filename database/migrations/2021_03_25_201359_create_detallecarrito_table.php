<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallecarritoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detallecarrito', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('cantidad');
            $table->integer('talla');

            $table->integer('idCarrito')->unsigned();
            $table->foreign('idCarrito')->references('id')->on('carrito')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('idCalzado')->unsigned();
            $table->foreign('idCalzado')->references('id')->on('calzados')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('detallecarrito');
    }
}

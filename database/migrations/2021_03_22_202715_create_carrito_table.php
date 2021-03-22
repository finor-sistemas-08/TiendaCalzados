<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarritoTable extends Migration
{

    public function up()
    {
        Schema::create('carrito', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('idCliente')->unsigned();
            $table->foreign('idCalzado')->references('id')->on('calzados')->onDelete('cascade')->onUpdate('cascade');


            $table->integer('idCalzado')->unsigned();
            $table->foreign('idCalzado')->references('id')->on('calzados')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('carrito');
    }
}

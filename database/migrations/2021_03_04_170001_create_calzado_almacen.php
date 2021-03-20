<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalzadoAlmacen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calzado_almacen', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('stock')->unsigned();

            $table->integer('idCalzado')->unsigned();
            $table->integer('idAlmacen')->unsigned()->nullable();

            $table->foreign('idCalzado')->references('id')->on('calzados')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('calzado_almacen');
    }
}

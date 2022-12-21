<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('salida_productos', function (Blueprint $table) {
            $table->id();
            $table->string('observacionSalidaProducto',100);
            $table->string('fechaSalidaProducto');
            $table->double('cantidadSalidaProducto',9,2)->nullable()->default(1);
            $table->unsignedBigInteger('idMotivo');
            $table->foreign('idMotivo')->references('id')->on('motivos');
            $table->unsignedBigInteger('idProducto');
            $table->foreign('idProducto')->references('id')->on('productos');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('salida_productos');
    }
};

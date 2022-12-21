<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('detalle_ventas', function (Blueprint $table) {
            $table->id();
            $table->double('cantidadDetalleVenta',9,2);
            $table->double('precioDetalleVenta',9,2);
            $table->double('totalDetalleVenta',9,2);
            $table->unsignedBigInteger('idProducto');
            $table->foreign('idProducto')->references('id')->on('productos');
            $table->unsignedBigInteger('idVenta');
            $table->foreign('idVenta')->references('id')->on('ventas');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('detalle_ventas');
    }
};

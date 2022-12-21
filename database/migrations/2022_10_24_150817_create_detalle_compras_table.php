<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('detalle_compras', function (Blueprint $table) {
            $table->id();
            $table->double('cantidadDetalleCompra',9,2);
            $table->double('precioDetalleCompra',9,2);
            $table->double('totalDetalleCompra',9,2);
            $table->unsignedBigInteger('idProducto');
            $table->foreign('idProducto')->references('id')->on('productos');
            $table->unsignedBigInteger('idCompra');
            $table->foreign('idCompra')->references('id')->on('compras');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('detalle_compras');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->string('serieVenta',50);
            $table->string('numeroVenta',50);
            $table->string('fechaVenta',50);
            $table->boolean('subTotalVenta',9,2);
            $table->boolean('igvVenta',9,2);
            $table->boolean('totalVenta',9,2);
            $table->boolean('esCreditoVenta',30);
            $table->boolean('estadoVenta');
            $table->unsignedBigInteger('idMedioPago');
            $table->foreign('idMedioPago')->references('id')->on('medio_pagos');
            $table->unsignedBigInteger('idPedido');
            $table->foreign('idPedido')->references('id')->on('pedidos');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ventas');
    }
};

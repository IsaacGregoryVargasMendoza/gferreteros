<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->string('serieCompra',50);
            $table->string('numeroCompra',50);
            $table->string('fechaCompra',50);
            $table->boolean('subTotalCompra',9,2);
            $table->boolean('igvCompra',9,2);
            $table->boolean('totalCompra',9,2);
            $table->boolean('estadoCompra');
            $table->unsignedBigInteger('idProveedor');
            $table->foreign('idProveedor')->references('id')->on('proveedors');
            $table->unsignedBigInteger('idTrabajador');
            $table->foreign('idTrabajador')->references('id')->on('trabajadors');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('compras');
    }
};

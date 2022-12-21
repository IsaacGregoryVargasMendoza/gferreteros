<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->string('numeroPago');
            $table->string('fechaPago');
            $table->double('montoPago',9,2);
            $table->unsignedBigInteger('idVenta');
            $table->foreign('idVenta')->references('id')->on('ventas');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pagos');
    }
};

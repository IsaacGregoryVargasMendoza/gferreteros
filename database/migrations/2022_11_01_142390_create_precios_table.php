<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('precios', function (Blueprint $table) {
            $table->id();
            $table->double('cantidadMinimaPrecio');
            $table->double('montoPrecio');
            $table->unsignedBigInteger('idPresentacion');
            $table->foreign('idPresentacion')->references('id')->on('presentacions');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('precios');
    }
};

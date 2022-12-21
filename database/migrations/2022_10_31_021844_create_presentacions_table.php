<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('presentacions', function (Blueprint $table) {
            $table->id();
            $table->string('descripcionPresentacion')->nullable();
            $table->double('stockPresentacion',9,2)->nullable()->default(0);
            $table->unsignedBigInteger('idUnidadMedida');
            $table->unsignedBigInteger('idProducto');
            $table->foreign('idUnidadMedida')->references('id')->on('unidad_medidas');
            $table->foreign('idProducto')->references('id')->on('productos');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('presentacions');
    }
};

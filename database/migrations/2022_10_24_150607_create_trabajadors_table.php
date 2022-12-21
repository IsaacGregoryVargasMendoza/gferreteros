<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('trabajadors', function (Blueprint $table) {
            $table->id();
            $table->string('identificadorTrabajador',40);
            $table->string('nombreTrabajador',200);
            $table->string('direccionTrabajador',300);
            $table->string('correoTrabajador',200);
            $table->string('celularTrabajador',200);
            $table->string('cargoTrabajador',200);
            $table->boolean('estadoTrabajador');
            $table->unsignedBigInteger('idTipoDocumento');
            $table->foreign('idTipoDocumento')->references('id')->on('tipo_documentos');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('trabajadors');
    }
};

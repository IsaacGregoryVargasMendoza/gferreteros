<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('proveedors', function (Blueprint $table) {
            $table->id();
            $table->string('identificadorProveedor',40);
            $table->string('nombreProveedor',200);
            $table->string('direccionProveedor',300);
            $table->string('correoProveedor',200);
            $table->string('celularProveedor',200);
            $table->boolean('estadoProveedor');
            $table->unsignedBigInteger('idTipoDocumento');
            $table->foreign('idTipoDocumento')->references('id')->on('tipo_documentos');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('proveedors');
    }
};

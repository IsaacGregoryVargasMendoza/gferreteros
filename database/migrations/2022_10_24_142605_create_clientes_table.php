<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('identificadorCliente',40);
            $table->string('nombreCliente',200);
            $table->string('direccionCliente',300);
            $table->string('correoCliente',200);
            $table->string('celularCliente',200);
            $table->string('usuarioCliente',200);
            $table->string('contraseniaCliente',200);
            $table->boolean('estadoCliente');
            $table->unsignedBigInteger('idTipoDocumento');
            $table->foreign('idTipoDocumento')->references('id')->on('tipo_documentos');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('clientes');
    }
};

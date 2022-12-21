<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('usuario_sistemas', function (Blueprint $table) {
            $table->id();
            $table->string('nombreUsuarioSistema');
            $table->string('contraseniaUsuarioSistema');
            $table->unsignedBigInteger('idTrabajador');
            $table->foreign('idTrabajador')->references('id')->on('trabajadors');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('usuario_sistemas');
    }
};

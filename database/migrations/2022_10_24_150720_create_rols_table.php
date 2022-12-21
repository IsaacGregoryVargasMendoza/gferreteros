<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('rols', function (Blueprint $table) {
            $table->id();
            $table->string('nombreRol',100);
            $table->boolean('estadoRol')->nullable()->default(1);
            $table->unsignedBigInteger('idUsuarioSistema');
            $table->foreign('idUsuarioSistema')->references('id')->on('usuario_sistemas');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rols');
    }
};

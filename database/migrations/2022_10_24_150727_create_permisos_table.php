<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('permisos', function (Blueprint $table) {
            $table->id();
            $table->string('nombrePermiso',100);
            $table->boolean('estadoPermiso')->nullable()->default(1);
            $table->unsignedBigInteger('idRol');
            $table->foreign('idRol')->references('id')->on('rols');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('permisos');
    }
};

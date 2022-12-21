<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('motivos', function (Blueprint $table) {
            $table->id();
            $table->string('nombreMotivo',100);
            $table->boolean('estadoMotivo')->nullable()->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('motivos');
    }
};

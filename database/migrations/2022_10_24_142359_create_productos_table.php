<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('codigoProducto',10);
            $table->string('nombreProducto',200);
            $table->text('descripcionProducto')->nullable();
            $table->string('imagenProducto')->nullable()->default('');
            $table->boolean('visibleProducto')->nullable()->default(1);
            $table->boolean('estadoProducto')->nullable()->default(1);
            $table->unsignedBigInteger('idCategoria');
            $table->foreign('idCategoria')->references('id')->on('categorias');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('productos');
    }
};

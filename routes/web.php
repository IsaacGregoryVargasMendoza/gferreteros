<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;

Route::get('/', function () {
    return view('plantillas.admin');
});

Route::controller(CategoriaController::class)->group(function () {
    Route::get("/listacategorias","listaCategorias");
    Route::post("/categoria","store");
    Route::put("/categoria/{id}","update");
    Route::delete("/categoria/{id}","destroy");
});

Route::controller(ProductoController::class)->group(function () {
    Route::get("/listaproductos","listaProductos");
    Route::get("/crearproducto","crear");
    Route::post("/crearproducto","store");
});
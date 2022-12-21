<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\UnidadMedidaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PresentacionController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(CategoriaController::class)->group(function () {
    Route::get("/categorias","index");
    Route::get("/categoria/{id}","show");
});

Route::controller(UnidadMedidaController::class)->group(function () {
    Route::get("/unidadesDeMedida","index");
    Route::post("/unidadDeMedida","store");
    Route::get("/unidadDeMedida/{id}","show");
    Route::put("/unidadDeMedida/{id}","update");
    Route::delete("/unidadDeMedida/{id}","destroy");//si se borra de raiz se utiliza Route::delete
});

Route::controller(ProductoController::class)->group(function () {
    Route::get("/productos","index");
    Route::post("/producto","store");
    Route::get("/producto/{id}","show");
    Route::put("/producto/{id}","update");
    Route::delete("/producto/{id}","destroy");
});

Route::controller(PresentacionController::class)->group(function () {
    Route::get("/buscarpresentaciones/{idProducto}","buscarPresentaciones");
});

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presentacion;
use App\Models\Precio;

class PresentacionController extends Controller
{
    public function buscarPresentaciones($idProducto){
        $presentaciones = Presentacion::where('idProducto',$idProducto)->get();
        $lista = [];
        foreach($presentaciones as $presentacion){
            $precios = Precio::where('idPresentacion',$presentacion->id)->get();
            array_push($lista,$precios);
        }
        return array($presentaciones,$lista);
    }
}

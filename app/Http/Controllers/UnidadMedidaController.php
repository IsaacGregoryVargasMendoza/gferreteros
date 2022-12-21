<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UnidadMedida;

class UnidadMedidaController extends Controller
{
    public function index(){
        $unidadmedidas = UnidadMedida::where('estadoUnidadMedida',1)->get();
        return $unidadmedidas;
    }

    public function store(Request $request){
        $unidadmedida = new UnidadMedida();
        $unidadmedida->nombreUnidadMedida = $request->get('nombreUnidadMedida');
        $unidadmedida->estadoUnidadMedida = 1;

        $unidadmedida->save();
    }

    public function show($id){
        $unidadmedida = UnidadMedida::find($id);
        return $unidadmedida;
    }

    public function update(Request $request, $id){
        $unidadmedida = UnidadMedida::find($id);
        $unidadmedida->nombreUnidadMedida = $request->get('nombreUnidadMedida');

        $unidadmedida->save();
        return $unidadmedida;
    }

    public function destroy($id){
        $unidadmedida = UnidadMedida::find($id);
        $unidadmedida->estadoUnidadMedida = 0;

        $unidadmedida->save();
        return $unidadmedida;
    }
}

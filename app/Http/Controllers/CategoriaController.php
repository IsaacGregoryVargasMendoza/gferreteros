<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function index(){
        $categorias = Categoria::where('estadoCategoria',1)->get();
        return $categorias;
    }

    public function store(Request $request){
        $categoria = new Categoria();
        $categoria->nombreCategoria = $request->get('nombreCategoria');
        $categoria->estadoCategoria = 1;

        $categoria->save();
        return redirect('/listacategorias');
    }

    public function show($id){
        $categoria = Categoria::find($id);
        return $categoria;
    }

    public function update(Request $request, $id){
        //$categoria = new Categoria::findOrfail($id);
        $categoria = Categoria::find($id);
        $categoria->nombreCategoria = $request->get('nombreCategoria');

        $categoria->save();
        return redirect('/listacategorias');
    }

    public function destroy($id){
        $categoria = Categoria::find($id);
        $categoria->estadoCategoria = 0;

        $categoria->save();
        return redirect('/listacategorias');
    }

    public function listaCategorias(){
        $categorias = Categoria::where('estadoCategoria',1)->get();
        return view('categorias.listar',compact('categorias'));
    }
}

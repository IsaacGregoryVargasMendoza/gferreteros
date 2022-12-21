<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Precio;
use App\Models\Presentacion;
use App\Models\Categoria;
use App\Models\UnidadMedida;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    public function index(){
        $productos = Producto::where('estadoProducto',1)->get();
        $categorias = Categoria::all();
        return view('productos.listar',compact('productos','categorias'));
    }

    public function listaProductos(){
        $productos = Producto::all();
        $categorias = Categoria::all();
        return view('productos.listar',compact('productos','categorias'));
    }

    public function crear(){
        $categorias = Categoria::where('estadoCategoria',1)->get();
        $unidadMedidas = UnidadMedida::where('estadoUnidadMedida',1)->get();
        return view('productos.crear',compact('categorias','unidadMedidas'));
    }

    public function store(Request $request){
        try {
            DB::beginTransaction();
            $producto = new Producto();
            if($request->hasfile('imagenproducto')){
                $file = $request->file('imagenproducto');
                $destinoPath = 'imagenes/productos/';
                $nombreArchivo = time() . '-' . $file->getClientOriginalName();
                $carga = $request->file('imagenproducto')->move($destinoPath,$nombreArchivo);
                $producto->imagenProducto = $destinoPath . $nombreArchivo;
            }else {
                $producto->imagenProducto = "imagenes/no_imagen.png";
            }
            
            $producto->codigoProducto = "Sin Codigo";
            $producto->nombreProducto = $request->get('nombre');
            $producto->descripcionProducto = $request->get('detalle');
            $producto->visibleProducto = 1;
            $producto->idCategoria = $request->get('categoria');
            $producto->estadoProducto = 1;
            $producto->save();
            $lista = json_decode($request->get('presentaciones'),true)["presentaciones"];
            foreach($lista as $detalle){
                $presentacion = new Presentacion();
                $presentacion->idProducto = $producto->id;
                $presentacion->descripcionPresentacion = $detalle[0];
                $presentacion->idUnidadMedida = $detalle[1];
                $presentacion->save();
                if ($detalle[3]>0){
                    $precio1 = new Precio();
                    $precio1->idPresentacion = $presentacion->id;
                    $precio1->cantidadMinimaPrecio = $detalle[2];
                    $precio1->montoPrecio = $detalle[3];
                    $precio1->save();
                }
                if ($detalle[4]>0 && $detalle[5]>0){
                    $precio2 = new Precio();
                    $precio2->idPresentacion = $presentacion->id;
                    $precio2->cantidadMinimaPrecio = $detalle[4];
                    $precio2->montoPrecio = $detalle[5];
                    $precio2->save();
                }
                if ($detalle[6]>0 && $detalle[7]>0){
                    $precio3 = new Precio();
                    $precio3->idPresentacion = $presentacion->id;
                    $precio3->cantidadMinimaPrecio = $detalle[6];
                    $precio3->montoPrecio = $detalle[7];
                    $precio3->save();
                }
            }
            DB::commit();
            return redirect('/listaproductos');
        }
        catch (Exception $exception){
            DB::rollBack();
            return "ERROR NO SE INGRESO VENTA.";
        }
    }

    public function show($id){
        $producto = Producto::find($id);
        return $producto;
    }

    public function update(Request $request, $id){
        $producto = Producto::find($id);
        if($request->hasfile('imagenProducto')){
            $file = $request->file('imagenProducto');
            $destinoPath = 'imagenes/productos/';
            $nombreArchivo = time() . '-' . $file->getClientOriginalName();
            $carga = $request->file('imagenProducto')->move($destinoPath,$nombreArchivo);
            $producto->imagenProducto = $destinoPath . $nombreArchivo;
        }else {
            $producto->imagenProducto = "imagenes/no_imagen.png";
        }
        
        $producto->codigoProducto = $request->get('codigoProducto');
        $producto->nombreProducto = $request->get('nombreProducto');
        $producto->descripcionProducto = $request->get('descripcionProducto');
        $producto->imagenProducto = $request->get('imagenProducto');
        $producto->visibleProducto = $request->get('visibleProducto');
        $producto->idCategoria = $request->get('idCategoria');
        $producto->estadoProducto = 1;

        $producto->save();
        return $producto;
    }

    public function destroy($id){
        $producto = Producto::find($id);
        $producto->estadoProducto = 0;

        $producto->save();
        return $producto;
    }
}

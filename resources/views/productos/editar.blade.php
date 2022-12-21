@extends('layouts.plantillaadmin')

@section('title')
Producto
@endsection

@section('css')
<link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection

@section('container-admin')
<div class="">
<div class="text-center"><h5>Editar Producto</h5></div>

<form action="/actualizarproducto/{{$producto->id}}" class="" method="POST" enctype="multipart/form-data" autocomplete="off">
    @csrf
    @method('PUT')
    @php
        $imagen = $producto->imagenProducto;

        if(!file_exists($imagen)){
            $imagen = "imagenes/no_imagen.png";
        }
    @endphp
    <div class="column">
    <div class="card shadow-sm col-11 mx-auto">
        <div class="card-body bg-light">
            <div class="row">
                <div class="col-5 mx-auto text-start">
                    <!-- Grupo Codigo -->
                    <label for="codigo" class="formulariolabel">Codigo</label>
                    <input type="text" id="codigo" name="codigo" class="form-control form-control-sm" tabindex="1" autocomplete="off" value ="{{$producto->codigoProducto}}" maxlength="10" readonly>

                    <!-- Grupo Nombre -->
                    <label for="nombre" class="formulariolabel">Nombre</label>
                    <input type="text" id="nombre" name="nombre" class="form-control form-control-sm" tabindex="2" autocomplete="off" value="{{$producto->nombreProducto}}" maxlength="100">

                    <!-- Grupo Detalles -->
                    <label for="detalle" class="formulariolabel">Detalles</label>
                    <textarea class="form-control form-control-sm" name="detalle" id="detalle" cols="30" rows="6" tabindex="3" autocomplete="off">{{$producto->descripcionProducto}}</textarea>

                    <!-- Grupo Stock -->
                    <label for="stock" class="formulariolabel">Stock</label>
                    <input type="text" id="stock" name="stock" class="form-control form-control-sm" tabindex="4" autocomplete="off" value="{{$producto->stockProducto}}">

                    <!-- Grupo Precio -->
                    <label for="precio" class="formulariolabel">Precio</label>
                    <input type="text" id="precio" name="precio" class="form-control form-control-sm" tabindex="5" autocomplete="off" value="{{$producto->precioProducto}}">

                    <!-- Grupo Unidad de Medida -->
                    <label for="unidadmedida" class="formulariolabel">Unidad de medida</label>
                    <select name="unidadmedida" id="unidadmedida" class="form-control form-control-sm" aria-label="Default select example" tabindex="6"> 
                        @if ($producto->unidadMedida == "UNIDAD")
                        <option selected="true" value="UNIDAD">UNIDAD</option>
                        <option value="GRAMO">GRAMO</option>
                        <option value="KILO">KILO</option>
                        <option value="CIENTO">CIENTO</option>
                        <option value="MILLAR">MILLAR</option>
                        <option value="LITRO">LITRO</option>
                        @elseif($producto->unidadMedida == "GRAMO")
                        <option value="UNIDAD">UNIDAD</option>
                        <option selected="true" value="GRAMO">GRAMO</option>
                        <option value="KILO">KILO</option>
                        <option value="CIENTO">CIENTO</option>
                        <option value="MILLAR">MILLAR</option>
                        <option value="LITRO">LITRO</option>
                        @elseif($producto->unidadMedida == "KILO")
                        <option value="UNIDAD">UNIDAD</option>
                        <option value="GRAMO">GRAMO</option>
                        <option selected="true" value="KILO">KILO</option>
                        <option value="CIENTO">CIENTO</option>
                        <option value="MILLAR">MILLAR</option>
                        <option value="LITRO">LITRO</option>
                        @elseif($producto->unidadMedida == "CIENTO")
                        <option value="UNIDAD">UNIDAD</option>
                        <option value="GRAMO">GRAMO</option>
                        <option value="KILO">KILO</option>
                        <option selected="true" value="CIENTO">CIENTO</option>
                        <option value="MILLAR">MILLAR</option>
                        <option value="LITRO">LITRO</option>
                        @elseif($producto->unidadMedida == "MILLAR")
                        <option value="UNIDAD">UNIDAD</option>
                        <option value="GRAMO">GRAMO</option>
                        <option value="KILO">KILO</option>
                        <option value="CIENTO">CIENTO</option>
                        <option value="MILLAR">MILLAR</option>
                        <option value="LITRO">LITRO</option>
                        @else
                        <option value="UNIDAD">UNIDAD</option>
                        <option value="GRAMO">GRAMO</option>
                        <option value="KILO">KILO</option>
                        <option value="CIENTO">CIENTO</option>
                        <option value="MILLAR">MILLAR</option>
                        <option selected="true" value="LITRO">LITRO</option>
                        @endif
                    </select>
                </div>

                <div class="col-5 mx-auto text-start">
                    <!-- Grupo Tipo Producto -->
                    <label for="tipoproducto" class="formulariolabel">Tipo de Producto</label>
                    <select name="tipoproducto" class="form-control form-control-sm" aria-label="Default select example" tabindex="7"> 
                        @foreach ($tipoproductos as $tipoproducto)
                            @if ($tipoproducto->id == $producto->tipoproducto->id)
                                <option selected="true" value="{{$tipoproducto->id}}">{{$tipoproducto->descripcionTipoProducto}}</option>
                            @else
                                <option value="{{$tipoproducto->id}}">{{$tipoproducto->descripcionTipoProducto}}</option>
                            @endif
                        @endforeach
                    </select>

                    <!-- Grupo esta Visible -->
                    <label for="visible" class="formulariolabel">Visible</label>
                    <select name="visible" class="form-control form-control-sm" aria-label="Default select example" tabindex="8">
                        @if ($producto->visibleProducto == 1)
                            <option selected="true" value="1">SI</option>
                            <option value="0">NO</option>
                        @else
                            <option value="1">SI</option>
                            <option selected="true" value="0">NO</option>
                        @endif
                    </select>

                    <!-- Grupo Producto -->
                    <label for="imagenproducto" class="formulariolabel">Imagen Producto</label>
                    <input type="file" id="imagenproducto" name="imagenproducto" class="form-control form-control-sm" tabindex="9" autocomplete="off" accept="image/*" onchange="mostrarImagen()">
                    
                    <!-- Imagen del Producto -->
                    <div class="card shadow-sm">
                        <img id="imagen" class="img-catalogo-formulario" src="/{{$imagen}}" alt="Imagen producto" >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="d-grid gap-1 col-5 mx-auto mt-3">
                    <button class="btn btn-primary btn-sm" type="submit" tabindex="10">Guardar</button>
                    <a href="{{ route('listaproductos.index')}}" class="btn btn-secondary btn-sm" type="button" tabindex="11">Cancelar</a>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@section('js')
    <script src="/js/formulario.js"></script>
@endsection
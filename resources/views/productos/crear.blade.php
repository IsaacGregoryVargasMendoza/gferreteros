@extends('plantillas.admin')

@section('title')
Producto
@endsection

@section('css')
<link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection

@section('container-admin')
    <div class="">
    <div class="text-center"><h5>Crear Producto</h5></div>

    <form id="formularioCrearProducto" action="/crearproducto" class="" method="POST" enctype="multipart/form-data" autocomplete="off">
        @csrf
        <div class="col-11 mx-auto">
            <div class="">
                <div class="row">
                    <div class="col-4 text-start">
                        <!-- Grupo Codigo -->
                        <label for="codigo" class="formulariolabel text-start">Codigo</label>
                        <input type="text" id="codigo" name="codigo" class="form-control form-control-sm" tabindex="1" autocomplete="off" maxlength="10" value="" readonly>

                        <!-- Grupo Categoria -->
                        <label for="categoria" class="formulariolabel text-start">Categoria</label>
                        <select name="categoria" class="form-control form-control-sm" aria-label="Default select example" tabindex="2"> 
                            @foreach ($categorias as $categoria)
                                <option value="{{$categoria->id}}">{{$categoria->nombreCategoria}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-5 text-start">
                        <!-- Grupo Nombre -->
                        <label for="nombre" class="formulariolabel text-start">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control form-control-sm" tabindex="3" autocomplete="off" maxlength="100">

                        <!-- Grupo Detalles -->
                        <label for="detalle" class="formulariolabel text-start">Detalles</label>
                        <textarea class="form-control form-control-sm" name="detalle" id="detalle" cols="30" rows="3" tabindex="4" autocomplete="off"></textarea>
                    </div>
                    <div class="col-3 mx-auto text-start">
                        <!-- Grupo File -->
                        <label for="imagenproducto" class="formulariolabel text-start">Imagen Producto</label>
                        <input type="file" id="imagenproducto" name="imagenproducto" class="form-control form-control-sm" tabindex="5" autocomplete="off" accept="image/*" onchange="mostrarImagen()">

                        <!-- Imagen del Producto -->
                        <div class="card shadow-sm text-center">
                            <img id="imagen" class="img-catalogo-formulario" src="/imagenes/no_imagen.png" alt="imagen producto">
                        </div>
                    </div>
                </div>
                <div class="row text-start">
                    <h5>Presentaciones</h5>
                    <p class="">
                        Para agregar una nueva presentacion a este producto, llene los campos. Al culminar por favor no se olvide de darle Click al boton de agregar.
                        Recuerde que la cantidad, en la cantidad minima que tiene que comprar el cliente para poder visualizar su precio respectivo. Mientras que el precio hace alusion al precio por la cantidad minima( unidad, kilo, litro, etc).
                    </p>
                </div>
                <div class="row bg-light p-3">
                    <div class="col-3 text-start">
                        <!-- Grupo Descripcion Presentacion -->
                        <label for="nombrePresentacion" class="formulariolabel text-start">Presentacion</label>
                        <input type="text" id="nombrePresentacion" name="nombrePresentacion" class="form-control form-control-sm" tabindex="6" autocomplete="off" maxlength="250">
                    </div>
                    <div class="col-2">
                        <!-- Grupo Unidad Medida -->
                        <label for="unidadMedida" class="formulariolabel text-start">Unidad Medida</label><a class="text-end" href="#">+agregar</a>
                        <select name="unidadMedida" id="unidadMedida" class="form-control form-control-sm" aria-label="Default select example" tabindex="7">
                            @foreach ($unidadMedidas as $unidadMedida)
                                <option value="{{$unidadMedida->id}}">{{$unidadMedida->nombreUnidadMedida}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-1 text-start">
                        <!-- Grupo Cantidad 1-->
                        <label for="cantidad1" class="formulariolabel text-start">Ctdad(C1)</label>
                        <input type="number" id="cantidad1" name="cantidad1" class="form-control form-control-sm text-end" tabindex="8" autocomplete="off">
                    </div>

                    <div class="col-1 text-start">
                        <!-- Grupo Precio 1-->
                        <label for="precio1" class="formulariolabel text-start">Precio(P1)</label>
                        <input type="number" id="precio1" name="precio1" class="form-control form-control-sm text-end" tabindex="9" autocomplete="off">
                    </div>

                    <div class="col-1 text-start">
                        <!-- Grupo Cantidad 2-->
                        <label for="cantidad2" class="formulariolabel text-start">Ctdad(C2)</label>
                        <input type="number" id="cantidad2" name="cantidad2" class="form-control form-control-sm text-end" tabindex="10" autocomplete="off">
                    </div>

                    <div class="col-1 text-start">
                        <!-- Grupo Precio 2-->
                        <label for="precio2" class="formulariolabel text-start">Precio(P2)</label>
                        <input type="number" id="precio2" name="precio2" class="form-control form-control-sm text-end" tabindex="11" autocomplete="off">
                    </div>

                    <div class="col-1 text-start">
                        <!-- Grupo Cantidad 3 -->
                        <label for="cantidad3" class="formulariolabel text-start">Ctdad(C3)</label>
                        <input type="number" id="cantidad3" name="cantidad3" class="form-control form-control-sm text-end" tabindex="12" autocomplete="off">
                    </div>

                    <div class="col-1 text-start pb-2">
                        <!-- Grupo Precio 3-->
                        <label for="precio3" class="formulariolabel text-start">Precio(P3)</label>
                        <input type="number" id="precio3" name="precio3" class="form-control form-control-sm text-end" tabindex="13" autocomplete="off">
                    </div>

                    <div class="col-1 text-start">
                        <label for="precio" class="formulariolabel text-start">Acciones</label>
                        <!-- <a href="" class="btn btn-info btn-sm">o.O</a> -->
                        <a onclick="agregarPresentacion()" class="btn btn-primary btn-sm">Agregar</a>
                    </div>
                    <input type="hidden" name="presentaciones" id="presentaciones">
                </div>
                <div class="row">
                    <div class="mt-5 text-end">
                        <button id="btnGuardar" class="btn btn-primary btn-sm" type="submit" onclick="clickGuardar()" tabindex="14">Guardar</button>
                        <a href="/listaproductos" class="btn btn-secondary btn-sm" type="button" tabindex="15">Cancelar</a>
                    </div>
                </div>
                <div>
                    <table id="datatable" class="table table-striped mt-4">
                        <thead class="table-hover">
                            <th scope="col" class="">Presentacion</th>
                            <th scope="col" class="" style="width:100px">U. Medida</th>
                            <th class="text-end" style="width:100px" scope="col">Ctdad (C1)</th>
                            <th class="text-end" style="width:100px" scope="col">Precio (P1)</th>
                            <th class="text-end" style="width:100px" scope="col">Ctdad (C2)</th>
                            <th class="text-end" style="width:100px" scope="col">Precio (P2)</th>
                            <th class="text-end" style="width:100px" scope="col">Ctdad (C3)</th>
                            <th class="text-end" style="width:100px" scope="col">Precio (P3)</th>
                        </thead>
                        <tbody id="tbody">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </form>
    </div>
@endsection

@section('js')
    <script src="/js/formularioCrearProducto.js"></script>
@endsection 
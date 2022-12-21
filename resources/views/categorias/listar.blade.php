@extends('plantillas.admin')

@section('title')
Grandes Ferreteros
@endsection

@section('css')
<link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection

@section('container-admin')
    @csrf
    @method('DELETE')
    <div class="col-8 mx-auto">
        <div class="card-body">
            <div class="text-center"><h4>Lista de Categorias</h4></div>
            <div class="text-end mb-2">
                <a data-bs-toggle="modal" data-bs-target="#modalRegistroCategoria" class="btn btn-primary btn-sm text-white">NUEVO</a>
                <a href="listaproductos" class="btn btn-secondary btn-sm">PRODUCTOS</a>
            </div>
            <table id="datatable" class="table table-striped">
                <thead class="table-dark">
                    <th scope="col">ID</th>
                    <th class="text-center" scope="col">Nombre</th>
                    <th class="text-center" scope="col">Acciones</th>
                </thead>
                <tbody>
                    @foreach($categorias as $categoria)
                    <tr>
                        <td>{{$categoria->id}}</td>
                        <td class="text-center">{{$categoria->nombreCategoria}}</td>
                        <td class="text-center">
                            <form action="/categoria/{{$categoria->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <!-- <button type="button" class="btn btn-info btn-sm">Ver</button> -->
                                <a class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalEditarCategoria" onclick="llenarDatos({{$categoria->id}})">Editar</a>
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="modalEditarCategoria" tabindex="-1" aria-labelledby="exampleModalLabelEditar" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="">
                    <div class="text-center bg-info pt-3 pb-1"><h4 id="exampleModalLabelEditar">Editar Categoria</h5></div>
                </div>
                <form action="" id="formularioEditar" class="" method="POST" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    @method('PUT')
                    <input type="text" id="id" hidden>
                    <div class="modal-body d-grid gap-1 col-10 mx-auto">
                        <label for="nombreCategoria" class="formulariolabel text-start">Nombre</label>
                        <input type="text" id="nombreCategoria" name="nombreCategoria" class="form-control" tabindex="1" autocomplete="off" maxlength="100">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal" tabindex="2">Cancelar</button>
                        <button type="submit" class="btn btn-primary btn-sm" tabindex="3">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalRegistroCategoria" tabindex="-1" aria-labelledby="exampleModalLabelCrear" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="">
                    <div class="text-center bg-info pt-3 pb-1"><h4 id="exampleModalLabelCrear">Nueva Categoria</h5></div>
                </div>
                <form action="/categoria" class="" method="POST" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    <div class="modal-body d-grid gap-1 col-10 mx-auto">
                        <label for="nombreCategoria" class="formulariolabel text-start">Nombre</label>
                        <input type="text" id="nombreCategoria" name="nombreCategoria" class="form-control" tabindex="1" autocomplete="off" maxlength="100">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal" tabindex="2">Cancelar</button>
                        <button type="submit" class="btn btn-primary btn-sm" tabindex="3">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src=""></script>
<script>
    $(document).ready(function () {
        $('#datatable').DataTable({
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
            }
        });
    });

    async function llenarDatos(id){
        const response = await fetch("http://localhost:8000/api/categoria/" + id)
        const json = await response.json()
        document.getElementById("id").value = json["id"]
        document.getElementById("nombreCategoria").value = json["nombreCategoria"]
        document.getElementById("formularioEditar").setAttribute('action', '/categoria/'+id)
        // console.log(json["id"])
    }
</script>
@endsection
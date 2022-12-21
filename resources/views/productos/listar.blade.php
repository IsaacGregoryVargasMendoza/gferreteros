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
    <div class="col-12 mx-auto">
        <div class="card-body">
            <div class="text-center"><h4>Lista de Productos</h4></div>
                <div class="text-end mb-2">
                    <a href="/crearproducto" class="btn btn-primary btn-sm">NUEVO</a>
                    <a href="listacategorias" class="btn btn-secondary btn-sm">CATEGORIAS</a>
                </div>
                <table id="datatable" class="table table-striped mt-4">
                    <thead class="table-primary">
                        <th scope="col">ID</th>
                        <th scope="col">Codigo</th>
                        <th scope="col">Nombre</th>
                        <th class="text-center" scope="col">Categoria</th>
                        <th class="text-center" scope="col">Acciones</th>
                    </thead>
                    <tbody>
                        @foreach($productos as $producto)
                        <tr>
                            <td>{{$producto->id}}</td>
                            <td class="text-start">{{$producto->codigoProducto}}</td>
                            <td class="text-start">{{$producto->nombreProducto}}</td>
                            <td class="text-start">{{$producto->categoria->nombreCategoria}}</td>
                            <td class="text-center">
                                <form action="" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#modalVerPresentacion" onclick="verPresentacion({{$producto->id}})">Ver</button>
                                    <a href="" class="btn btn-warning btn-sm">Editar</a>
                                    <button type="submit" class="btn btn-danger btn-sm">Borrar</button>
                                </form>
                            </td>
                        </tr>
                        <!-- <tr class="" style="display: none;">
                            <td class="" colspan="5">
                                <table id="" class="table text-center">
                                    <tr>
                                        <td colspan="3">solo</td>
                                        <td colspan="3">solo</td>
                                        <td colspan="3">solo</td>
                                    </tr>
                                    <tr class="" colspan="3">
                                        <td colspan="3">solo</td>
                                        <td colspan="3">solo</td>
                                        <td colspan="3">solo</td>
                                        <td>solo</td>
                                        <td>solo</td>
                                        <td>solo</td>
                                        <td>solo</td>
                                    </tr>
                                </table>
                            </td>
                        </tr> -->
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalVerPresentacion" tabindex="-1" aria-labelledby="exampleModalLabelEditar" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="">
                    <div class="bg-info p-2"><h4 id="exampleModalLabelEditar">Presentaciones</h5></div>
                </div>
                <!-- <form action="" id="formularioEditar" class="" method="POST" enctype="multipart/form-data" autocomplete="off">
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
                </form> -->
                <table id="" class="table">
                    <thead class="">
                        <th scope="col">ID</th>
                        <th scope="col">Presentacion</th>
                        <th scope="col">U. Medida</th>
                        <th scope="col">Ctdad(C1)</th>
                        <th scope="col">Precio(P1)</th>
                        <th scope="col">Ctdad(C2)</th>
                        <th scope="col">Precio(P2)</th>
                        <th scope="col">Ctdad(C3)</th>
                        <th scope="col">Precio(P3)</th>
                    </thead>
                    <tbody id="tbodyModal">
                    </tbody>
                </table>
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

    async function verPresentacion(idproducto){
        document.getElementById("tbodyModal").innerHTML = `<tr></tr>`
        const response = await fetch("http://localhost:8000/api/buscarpresentaciones/" + idproducto)
        const json = await response.json()
        for(var i=0; i<json[0].length;i++){
            json[0][i].lista = json[1][i];
        }
        //json[0].lista = json[1];
        console.log(json[0])
        //var contador = 0
        json[0].forEach(element => {
            //console.log(element);
            document.getElementById("tbodyModal").innerHTML += `<tr><td>`+element["id"]+`</td>
            <td class='text-uppercase'>`+element["descripcionPresentacion"]+`</td>`+
            `<td class='text-uppercase'>`+element["descripcionPresentacion"]+`</td>`+
            `<td class='text-end'>S/.`+ Number((element["lista"][0] == null)?0:element["lista"][0]["cantidadMinimaPrecio"]).toFixed(2)+`</td>
            <td class='text-end'>S/.`+ Number((element["lista"][0] == null)?0:element["lista"][0]["montoPrecio"]).toFixed(2)+`</td>
            <td class='text-end'>S/.`+ Number((element["lista"][1] == null)?0:element["lista"][1]["cantidadMinimaPrecio"]).toFixed(2)+`</td>
            <td class='text-end'>S/.`+ Number((element["lista"][1] == null)?0:element["lista"][1]["montoPrecio"]).toFixed(2)+`</td>
            <td class='text-end'>S/.`+ Number((element["lista"][2] == null)?0:element["lista"][2]["cantidadMinimaPrecio"]).toFixed(2)+`</td>
            <td class='text-end'>S/.`+ Number((element["lista"][2] == null)?0:element["lista"][2]["montoPrecio"]).toFixed(2)+`</td>
            </tr>`
        });
        // document.getElementById("id").value = json["id"]
        // document.getElementById("nombreCategoria").value = json["nombreCategoria"]
        // document.getElementById("formularioEditar").setAttribute('action', '/categoria/'+id)
    }
</script>
@endsection

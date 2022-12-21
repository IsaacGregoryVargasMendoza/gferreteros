function mostrarImagen() {
    let imagenProducto = document.getElementById('imagenproducto');
    let imagen = document.getElementById('imagen');

    if (!imagenProducto.value == "") {
        imagen.setAttribute('src', URL.createObjectURL(imagenProducto.files[0]));
    } else {
        imagen.setAttribute('src', "/imagenes/no_imagen.png");
    }
}
//const urlParams = new URLSearchParams(valores)
//var uni = urlParams. get('unidadMedidas');
// var uni = $_REQUEST('unidadMedidas');
// console.log(uni)

const nombrePresentacion = document.getElementById("nombrePresentacion");
const unidadMedida = document.getElementById("unidadMedida");
const precio1 = document.getElementById("precio1");
const precio2 = document.getElementById("precio2");
const precio3 = document.getElementById("precio3");
const cantidad1 = document.getElementById("cantidad1");
const cantidad2 = document.getElementById("cantidad2");
const cantidad3 = document.getElementById("cantidad3");
var presentaciones = []

function agregarPresentacion(){
    var selected = unidadMedida.options[unidadMedida.selectedIndex].text;
    let presentacion = [nombrePresentacion.value,unidadMedida.value,
        (cantidad1.value == "" || cantidad1.value == null)? 0:cantidad1.value,
        (precio1.value == "" || precio1.value == null)? 0:precio1.value,
        (cantidad2.value == "" || cantidad2.value == null)? 0:cantidad2.value,
        (precio2.value == "" || precio2.value == null)? 0:precio2.value,
        (cantidad3.value == "" || cantidad3.value == null)? 0:cantidad3.value,
        (precio3.value == "" || precio3.value == null)? 0:precio3.value,
        selected
    ]
    presentaciones.push(presentacion)
    var json = JSON.stringify({presentaciones})

    document.getElementById("presentaciones").value = json
    console.log(document.getElementById("presentaciones").value)
    verPresentaciones()
    limpiarCamposDePresentaciones()
}

function verPresentaciones(){
    document.getElementById("tbody").innerHTML = "<tr></tr>"
    for (var i = 0; i < presentaciones.length; i++) {
        document.getElementById("tbody").innerHTML += "<tr>  " +
            "<td>" + presentaciones[i][0] + "</td>" +
            "<td class='text-uppercase'>" + presentaciones[i][8] + "</td>" +
            "<td class='text-end'>S/." + Number(presentaciones[i][2]).toFixed(2) + "</td>" +
            "<td class='text-end'>" + Number(presentaciones[i][3]).toFixed(2) + "</td>" +
            "<td class='text-end'>S/." + Number(presentaciones[i][4]).toFixed(2) + "</td>" +
            "<td class='text-end'>S/." + Number(presentaciones[i][5]).toFixed(2) + "</td>" +
            "<td class='text-end'>S/." + Number(presentaciones[i][6]).toFixed(2) + "</td>" +
            "<td class='text-end'>S/." + Number(presentaciones[i][7]).toFixed(2) + "</td>" +
            "<td class='text-center'> " +
            "   <button type='button' onclick='eliminarProducto("+i+")'><i class='fa fa-solid fa-trash'></i></button> " +
            "</td>" +
            "</tr>"
    }
}

function limpiarCamposDePresentaciones(){
    nombrePresentacion.value = ""
    unidadMedida.selectedIndex = 0;
    precio1.value = ""
    cantidad1.value = ""
    precio2.value = ""
    cantidad2.value = ""
    precio3.value = ""
    cantidad3.value = ""
}

function clickGuardar(){
    document.getElementById("btnGuardar").disabled = true;
    document.getElementById("formularioCrearProducto").submit();
}

function eliminarProducto(indice){
    presentaciones.splice(indice,1)
    verPresentaciones()
    limpiarCamposDePresentaciones()
}


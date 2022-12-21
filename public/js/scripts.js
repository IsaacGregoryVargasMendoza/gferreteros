/*!
    * Start Bootstrap - SB Admin v7.0.5 (https://startbootstrap.com/template/sb-admin)
    * Copyright 2013-2022 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
    */
    // 
// Scripts
// 
const firsName = document.getElementById('inputFirstName');
const nroDocumento = document.getElementById('NroDoc');
const nomUsuario = document.getElementById('inputnick');
const inputEmail = document.getElementById('inputEmail');
const password1 = document.getElementById('inputPassword');
const password2 = document.getElementById('inputPassword2');
const formularioRegistro = document.getElementById('formularioRegistro');

window.addEventListener('DOMContentLoaded', event => {
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }
});

function crear(){
    event.preventDefault();
    if (firsName.value.length>0 && nroDocumento.value.length>0 && nomUsuario.value.length>0 && inputEmail.value.length>0 && password1.value.length>0){
        if(password1.value == password2.value){
            formularioRegistro.submit()
        } else {
            alert("Contraseñas diferentes.")
        }
    }else {
        alert("Falta llenar campos.")
    }
}
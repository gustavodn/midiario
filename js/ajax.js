// JavaScript Document

// Función para recoger los datos de PHP según el navegador, se usa siempre.
function objetoAjax() {
    var xmlhttp = false;
    try {
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {

        try {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (E) {
            xmlhttp = false;
        }
    }

    if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
        xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
}

//Función para recoger los datos del formulario y enviarlos por post  
function enviarDatosEmpleado() {

    //div donde se mostrará lo resultados
    divResultado = document.getElementById('resultado');
    //recogemos los valores de los inputs
    titulo = document.nueva_entrada.titulo.value;
    etiqueta = document.nueva_entrada.etiqueta.value;
    estadoanimo = document.nueva_entrada.estadoanimo.value;
    desarrollo = document.nueva_entrada.desarrollo.value;
    comentario = document.nueva_entrada.comentario.value;

    //instanciamos el objetoAjax
    ajax = objetoAjax();

    //uso del medotod POST
    //archivo que realizará la operacion
    //registro.php
    ajax.open("POST", "registro_entrada.php", true);
    //cuando el objeto XMLHttpRequest cambia de estado, la función se inicia
    ajax.onreadystatechange = function() {
        //la función responseText tiene todos los datos pedidos al servidor
        if (ajax.readyState == 4) {
            //mostrar resultados en esta capa
            divResultado.innerHTML = ajax.responseText
        }
    }
    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    //enviando los valores a registro.php para que inserte los datos
    ajax.send("titulo=" + titulo + "&etiqueta=" + etiqueta + "&estadoanimo=" + estadoanimo + "&desarrollo=" + desarrollo + "&comentario=" + comentario)

    $("#btn-AddDate").on("click", function() {});
}

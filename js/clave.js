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
    actual = document.nuevo_empleado.actual.value;
    clave1 = document.nuevo_empleado.clave1.value;
    clave2 = document.nuevo_empleado.clave2.value;

    //instanciamos el objetoAjax
    ajax = objetoAjax();

    //uso del medotod POST
    //archivo que realizará la operacion
    //registro.php
    ajax.open("POST", "cambio_clave.php", true);
    //cuando el objeto XMLHttpRequest cambia de estado, la función se inicia
    ajax.onreadystatechange = function() {
        //la función responseText tiene todos los datos pedidos al servidor
        if (ajax.readyState == 4) {
            //mostrar resultados en esta capa
            divResultado.innerHTML = ajax.responseText
                //llamar a funcion para limpiar los inputs
            LimpiarCampos2();
        }
    }
    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    //enviando los valores a registro.php para que inserte los datos
    ajax.send("actual=" + actual + "&clave1=" + clave1 + "&clave2=" + clave2)
}

//función para limpiar los campos
function LimpiarCampos2() {
    document.nuevo_empleado.actual.value = "";
    document.nuevo_empleado.clave1.value = "";
    document.nuevo_empleado.clave2.value = "";
    document.nuevo_empleado.actual.focus();
}


//Función para recoger los datos del formulario y enviarlos por post  
function enviarDatosCorreo() {

    //div donde se mostrará lo resultados
    divResultado = document.getElementById('resultado1');
    //recogemos los valores de los inputs
    correo = document.nuevo_correo.correo.value;
    verificacion = document.nuevo_correo.verificacion.value;

    //instanciamos el objetoAjax
    ajax = objetoAjax();

    //uso del medotod POST
    //archivo que realizará la operacion
    //registro.php
    ajax.open("POST", "cambio_correo.php", true);
    //cuando el objeto XMLHttpRequest cambia de estado, la función se inicia
    ajax.onreadystatechange = function() {
        //la función responseText tiene todos los datos pedidos al servidor
        if (ajax.readyState == 4) {
            //mostrar resultados en esta capa
            divResultado.innerHTML = ajax.responseText
                //llamar a funcion para limpiar los inputs
            LimpiarCampos1();
        }
    }
    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    //enviando los valores a registro.php para que inserte los datos
    ajax.send("correo=" + correo + "&verificacion=" + verificacion)
}

//función para limpiar los campos
function LimpiarCampos1() {
    document.nuevo_correo.correo.value = "";
    document.nuevo_correo.verificacion.value = "";
    document.nuevo_correo.correo.focus();
}



//Función para recoger los datos del formulario y enviarlos por post  
function enviarCorreoAlternativo() {

    //div donde se mostrará lo resultados
    divResultado = document.getElementById('resultado2');
    //recogemos los valores de los inputs
    correo = document.correo_alternativo.correo.value;

    //instanciamos el objetoAjax
    ajax = objetoAjax();

    //uso del medotod POST
    //archivo que realizará la operacion
    //registro.php
    ajax.open("POST", "correo_alternativo.php", true);
    //cuando el objeto XMLHttpRequest cambia de estado, la función se inicia
    ajax.onreadystatechange = function() {
        //la función responseText tiene todos los datos pedidos al servidor
        if (ajax.readyState == 4) {
            //mostrar resultados en esta capa
            divResultado.innerHTML = ajax.responseText
                //llamar a funcion para limpiar los inputs
            LimpiarCampos3();
        }
    }
    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    //enviando los valores a registro.php para que inserte los datos
    ajax.send("correo=" + correo)
}

//función para limpiar los campos
function LimpiarCampos3() {
    document.correo_alternativo.correo.value = "";
    document.correo_alternativo.correo.focus();
}


//Función para recoger los datos del formulario y enviarlos por post  
function enviarValidacionAcceso() {

    //div donde se mostrará lo resultados
    divResultado = document.getElementById('resultado3');
    //recogemos los valores de los inputs
    opciones = document.validacion_acceso.opciones.value;

    //instanciamos el objetoAjax
    ajax = objetoAjax();

    //uso del medotod POST
    //archivo que realizará la operacion
    //registro.php
    ajax.open("POST", "validacion_acceso.php", true);
    //cuando el objeto XMLHttpRequest cambia de estado, la función se inicia
    ajax.onreadystatechange = function() {
        //la función responseText tiene todos los datos pedidos al servidor
        if (ajax.readyState == 4) {
            //mostrar resultados en esta capa
            divResultado.innerHTML = ajax.responseText
                //llamar a funcion para limpiar los inputs
            LimpiarCampos4();
        }
    }
    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    //enviando los valores a registro.php para que inserte los datos
    ajax.send("opciones=" + opciones)
}


//Función para recoger los datos del formulario y enviarlos por post  
function enviarCuenta() {

    //div donde se mostrará lo resultados
    divResultado = document.getElementById('resultado4');
    //recogemos los valores de los inputs
    desactivar = document.cuenta.desactivar.value;
    tiempo = document.cuenta.tiempo.value;

    //instanciamos el objetoAjax
    ajax = objetoAjax();

    //uso del medotod POST
    //archivo que realizará la operacion
    //registro.php
    ajax.open("POST", "suspender_cuenta.php", true);
    //cuando el objeto XMLHttpRequest cambia de estado, la función se inicia
    ajax.onreadystatechange = function() {
        //la función responseText tiene todos los datos pedidos al servidor
        if (ajax.readyState == 4) {
            //mostrar resultados en esta capa
            divResultado.innerHTML = ajax.responseText
                //llamar a funcion para limpiar los inputs
            LimpiarCampos6();
        }
    }
    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    //enviando los valores a registro.php para que inserte los datos
    ajax.send("desactivar=" + desactivar + "&tiempo=" + tiempo)
}

//función para limpiar los campos
function LimpiarCampos6() {
    document.cuenta.tiempo.value = "";
}
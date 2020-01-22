//Funcion para ejecutar los comentarios
function enviarCuenta() {

    //div donde se mostrará lo resultados
    divResultado = document.getElementById('resultado3');
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
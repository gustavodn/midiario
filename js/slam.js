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
function enviarSlam1() {

    //div donde se mostrará lo resultados
    divResultado = document.getElementById('derecha');
    //recogemos los valores de los inputs
    diario = document.slam_1.diario.value;
    pregunta = document.slam_1.pregunta.value;
    logro = document.slam_1.logro.value;
    pelicula = document.slam_1.pelicula.value;
    regalo = document.slam_1.regalo.value;
    cancion = document.slam_1.cancion.value;
    pasatiempo = document.slam_1.pasatiempo.value;

    //instanciamos el objetoAjax
    ajax = objetoAjax();

    //uso del medotod POST
    //archivo que realizará la operacion
    //registro.php
    ajax.open("POST", "pross_slam1.php", true);
    //cuando el objeto XMLHttpRequest cambia de estado, la función se inicia
    ajax.onreadystatechange = function() {
        //la función responseText tiene todos los datos pedidos al servidor
        if (ajax.readyState == 4) {
            //mostrar resultados en esta capa
            divResultado.innerHTML = ajax.responseText
                //llamar a funcion para limpiar los inputs
        }
    }
    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    //enviando los valores a registro.php para que inserte los datos
    ajax.send("diario=" + diario + "&pregunta=" + pregunta + "&logro=" + logro + "&pelicula=" + pelicula + "&regalo=" + regalo + "&cancion=" + cancion + "&pasatiempo=" + pasatiempo)
}



//Función para recoger los datos del formulario y enviarlos por post  
function enviarSlam2() {

    //div donde se mostrará lo resultados
    divResultado = document.getElementById('resultado');
    //recogemos los valores de los inputs
    amor = document.slam_2.amor.value;
    fobia = document.slam_2.fobia.value;
    cubierta = document.slam_2.cubierta.value;
    persona = document.slam_2.persona.value;
    extrano = document.slam_2.extrano.value;
    no_harias = document.slam_2.no_harias.value;
    prefieres = document.slam_2.prefieres.value;

    //instanciamos el objetoAjax
    ajax = objetoAjax();

    //uso del medotod POST
    //archivo que realizará la operacion
    //registro.php
    ajax.open("POST", "pross_slam2.php", true);
    //cuando el objeto XMLHttpRequest cambia de estado, la función se inicia
    ajax.onreadystatechange = function() {
        //la función responseText tiene todos los datos pedidos al servidor
        if (ajax.readyState == 4) {
            //mostrar resultados en esta capa
            divResultado.innerHTML = ajax.responseText
                //llamar a funcion para limpiar los inputs
        }
    }
    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    //enviando los valores a registro.php para que inserte los datos
    ajax.send("amor=" + amor + "&fobia=" + fobia + "&cubierta=" + cubierta + "&persona=" + persona + "&extrano=" + extrano + "&no_harias=" + no_harias + "&prefieres=" + prefieres)
}



//Función para recoger los datos del formulario y enviarlos por post  
function enviarSlam3() {

    //div donde se mostrará lo resultados
    divResultado = document.getElementById('resultado');
    //recogemos los valores de los inputs
    gustaria = document.slam_3.gustaria.value;
    preferida_pelicula = document.slam_3.preferida_pelicula.value;
    roto_corazon = document.slam_3.roto_corazon.value;
    dificil = document.slam_3.dificil.value;
    lugar_lindo = document.slam_3.lugar_lindo.value;
    amor_prohibido = document.slam_3.amor_prohibido.value;
    mejor_pasado = document.slam_3.mejor_pasado.value;

    //instanciamos el objetoAjax
    ajax = objetoAjax();

    //uso del medotod POST
    //archivo que realizará la operacion
    //registro.php
    ajax.open("POST", "pross_slam3.php", true);
    //cuando el objeto XMLHttpRequest cambia de estado, la función se inicia
    ajax.onreadystatechange = function() {
        //la función responseText tiene todos los datos pedidos al servidor
        if (ajax.readyState == 4) {
            //mostrar resultados en esta capa
            divResultado.innerHTML = ajax.responseText
                //llamar a funcion para limpiar los inputs
        }
    }
    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    //enviando los valores a registro.php para que inserte los datos
    ajax.send("gustaria=" + gustaria + "&preferida_pelicula=" + preferida_pelicula + "&roto_corazon=" + roto_corazon + "&dificil=" + dificil + "&lugar_lindo=" + lugar_lindo + "&amor_prohibido=" + amor_prohibido + "&mejor_pasado=" + mejor_pasado)
}


//Función para recoger los datos del formulario y enviarlos por post  
function enviarSlam4() {

    //div donde se mostrará lo resultados
    divResultado = document.getElementById('resultado');
    //recogemos los valores de los inputs
    sociedad = document.slam_4.sociedad.value;
    impresionante = document.slam_4.impresionante.value;
    no_volverias = document.slam_4.no_volverias.value;
    fisicamente = document.slam_4.fisicamente.value;
    sexo_opuesto = document.slam_4.sexo_opuesto.value;
    moda = document.slam_4.moda.value;
    orgullo = document.slam_4.orgullo.value;

    //instanciamos el objetoAjax
    ajax = objetoAjax();

    //uso del medotod POST
    //archivo que realizará la operacion
    //registro.php
    ajax.open("POST", "pross_slam4.php", true);
    //cuando el objeto XMLHttpRequest cambia de estado, la función se inicia
    ajax.onreadystatechange = function() {
        //la función responseText tiene todos los datos pedidos al servidor
        if (ajax.readyState == 4) {
            //mostrar resultados en esta capa
            divResultado.innerHTML = ajax.responseText
                //llamar a funcion para limpiar los inputs
        }
    }
    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    //enviando los valores a registro.php para que inserte los datos
    ajax.send("sociedad=" + sociedad + "&impresionante=" + impresionante + "&no_volverias=" + no_volverias + "&fisicamente=" + fisicamente + "&sexo_opuesto=" + sexo_opuesto + "&moda=" + moda + "&orgullo=" + orgullo)
}


//Función para recoger los datos del formulario y enviarlos por post  
function enviarSlam5() {

    //div donde se mostrará lo resultados
    divResultado = document.getElementById('resultado');
    //recogemos los valores de los inputs
    regla = document.slam_5.regla.value;
    grupo = document.slam_5.grupo.value;
    error = document.slam_5.error.value;
    regresarias = document.slam_5.regresarias.value;
    biografia = document.slam_5.biografia.value;
    vivir = document.slam_5.vivir.value;
    fin = document.slam_5.fin.value;

    //instanciamos el objetoAjax
    ajax = objetoAjax();

    //uso del medotod POST
    //archivo que realizará la operacion
    //registro.php
    ajax.open("POST", "pross_slam5.php", true);
    //cuando el objeto XMLHttpRequest cambia de estado, la función se inicia
    ajax.onreadystatechange = function() {
        //la función responseText tiene todos los datos pedidos al servidor
        if (ajax.readyState == 4) {
            //mostrar resultados en esta capa
            divResultado.innerHTML = ajax.responseText
                //llamar a funcion para limpiar los inputs
        }
    }
    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    //enviando los valores a registro.php para que inserte los datos
    ajax.send("regla=" + regla + "&grupo=" + grupo + "&error=" + error + "&regresarias=" + regresarias + "&biografia=" + biografia + "&vivir=" + vivir + "&fin=" + fin)
}


<?php
// Datos de la conexion
$conn_string = "host='localhost' port='5432' dbname='midiario' user='postgres' password='root'";
// Lanzamos la conexion
$dbcon = pg_connect($conn_string);
// Revisamos el estado de la coneccion
if(!$dbcon){
    echo "Error: No hay conexion con la base de datos";
}
else{
}

function generarCodigo($longitud) {
    $key = '';
    $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
    $max = strlen($pattern)-1;
    for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
    return $key;
   }
?>
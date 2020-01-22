<?php
include('includes/db.php');
include('auth.php');

    $mensaje = $_POST['mensaje'];
    $conversacion = $_POST['conversacion'];
    $de = $_POST['de'];
    $para = $_POST['para'];
    $fecha = date('d-m-Y');
    $hora = date('H-i-s');

        $sql = "INSERT INTO mensajes (id_conversacion, de, para, fecha, hora, mensaje) VALUES ('$conversacion', '$de', '$para', '$fecha', '$hora', '$mensaje')";
        $eje = pg_query($dbcon, $sql);

            if(!$eje){
                echo "Error";
            }

            else{
                header('Location: conversaciones.php?id=$conversacion');
            }

?>
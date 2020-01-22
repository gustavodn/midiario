<?php
include('includes/db.php');
include('auth.php');
$usuario = $_SESSION['usuario'];
$user = $_GET['usuario'];

$sql1 = "DELETE FROM confidente WHERE confidente1 = '$user' AND confidente2 = '$usuario'";
$sql2 = "DELETE FROM confidente WHERE confidente2 = '$user' AND confidente1 = '$usuario'";
$eje1 = pg_query($dbcon, $sql1) or die (pg_last_error());
$eje2 = pg_query($dbcon, $sql2);

$sql3 = "DELETE FROM solicitud_confidente WHERE solicitante = '$user' AND solicitado = '$usuario'";
$sql4 = "DELETE FROM solicitud_confidente WHERE solicitante = '$usuario' AND solicitado = '$user'";
$eje3 = pg_query($dbcon, $sql3);
$eje4 = pg_query($dbcon, $sql4);

    if(!$eje1){
        echo "error 1";
    }
    elseif(!$eje2){
        echo "error 2";
    }
    elseif(!$eje3){
        echo "error 3";
    }
    elseif(!$eje4){
        echo "error 4";
    }
    else{
        header("Location: murouser.php?usuario=$user");
    }
?>
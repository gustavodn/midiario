<?php
include("../includes/db.php");
$id = $_GET['id'];

$sql = "DELETE FROM etiqueta WHERE id = '$id'";
$eje = pg_query($dbcon, $sql);
    if(!$eje){
        echo "Error: Etiqueta no eliminada.";
    }
    else{
        header("Location: lista_etiquietas.php");
    }
?>
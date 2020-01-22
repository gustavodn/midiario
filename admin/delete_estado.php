<?php
include("../includes/db.php");
$id = $_GET['id'];

$sql = "DELETE FROM estadoanimo WHERE id = '$id'";
$eje = pg_query($dbcon, $sql);
    if(!$eje){
        echo "Error: Estado no eliminado.";
    }
    else{
        header("Location: lista_estados.php");
    }
?>
<?php
include('includes/db.php');
include('auth.php');

$usuario = $_SESSION['usuario'];
$user = $_GET['usuario'];

$sql_pri = "SELECT * FROM conversaciones WHERE usuario1 = '$usuario' AND usuario2 = '$user'";
$eje_pri = pg_query($dbcon, $sql_pri);
$count_pri = pg_num_rows($eje_pri);
$verifi = pg_fetch_array($eje_pri);
$id_conversacion = $verifi['id_conversacion'];


if($count_pri > '0'){
  header("Location: privados.php?id=$id_conversacion");
}
else{
  $id = generarCodigo(20);
  $sql_reg = "INSERT INTO conversaciones (id_conversacion,usuario1,usuario2) VALUES ('$id','$usuario','$user')";
  $sql_reg2 = "INSERT INTO conversaciones (id_conversacion,usuario1,usuario2) VALUES ('$id','$user','$usuario')";
  $eje_reg = pg_query($dbcon, $sql_reg) or die (pg_last_error());
  $eje_reg2 = pg_query($dbcon, $sql_reg2) or die (pg_last_error());

  $sql_pri = "SELECT * FROM conversaciones WHERE usuario1 = '$usuario' AND usuario2 = '$usuario2'";
  $eje_pri = pg_query($dbcon, $sql_pri);
  $count_pri = pg_num_rows($eje_pri);
  $id_conversacion = $verifi['id_conversacion'];

    if($count_pri > '0'){
      header("Location: privados.php?id=$id_conversacion");
    }
    else{
      header("Location: privados.php?id=$id_conversacion");
    }
}
?>



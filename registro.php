<?php
include("includes/db.php");
$sqlid = "SELECT id FROM md_user";
$sqlid = pg_query($dbcon,$sqlid);
$queryid = generarCodigo(20);

$dia = $_POST['dia'];
$mes = $_POST['mes'];
$ano = $_POST['ano'];

$user  = $_POST['user'];
$email = $_POST['email'];
$password = sha1($_POST['password']);
$fecha_nacimiento = "$dia-$mes-$ano";
$sexo = $_POST['sexo'];
$pais = $_POST['pais'];
$signo = $_POST['signo'];
$nombre = $_POST['nombre'];

    $sql = "SELECT email FROM md_user WHERE email = '$email'";
    $eje = pg_query($dbcon, $sql);
    $count = pg_num_rows($eje);

      if($count > '0'){
        
      }
    $sql = "INSERT INTO md_user (id,usuario,email,pass,fecha,sexo,pais,signo,nombre,bloqueos,reportes) VALUES ('$queryid','$user','$email','$password','$fecha_nacimiento','$sexo','$pais','$signo','$nombre','0','0')";
$query = pg_query($dbcon, $sql) or die(pg_last_error());

  header("Location: index.php");
?>





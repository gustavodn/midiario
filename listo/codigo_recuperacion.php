<?php
include("includes/db.php");
$codigo = generarCodigo(32);

$email = $_POST['email'];

$dia = $_POST['dia'];
$mes = $_POST['mes'];
$ano = $_POST['ano'];


$fecha = "$dia-$mes-$ano";

echo $fecha; 

$sql = "SELECT id FROM md_user WHERE email = '$email'";
$eje = pg_query($dbcon,$sql);
$count = pg_num_rows($eje);

    if($count > '0'){
            $sql = "SELECT * FROM md_user WHERE email = '$email' AND fecha = '$fecha'";
            $eje = pg_query($dbcon, $sql);
            $count = pg_num_rows($eje);
            $ver = pg_fetch_array($eje);

            if($count > '0'){
    
                    $id = $ver['id'];
                    $link = "nueva_clave.php?codigo=$codigo";
                    $sql = "UPDATE md_user SET recuperacion = '$codigo', link = '$link' WHERE id = '$id'";
                    $eje = pg_query($dbcon, $sql);

                        if(!$eje){
                            header("Location: recuperar_clave.php?sms=e"); 
                        }
                        else{
                            header("Location: recuperar_clave.php?sms=p");
                        }
            }
            else{
                header("Location: recuperar_clave.php?sms=f");
            }
    }
    else{
        header("Location: recuperar_clave.php?sms=c");
    }
?>
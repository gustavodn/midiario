<?php
include("includes/db.php");
include("auth.php");
$usuario = $_SESSION['usuario'];
$option = $_POST['opciones'];
    $sql = "SELECT * FROM tmp_entrada WHERE usuario = '$usuario'";
    $eje = pg_query($dbcon, $sql);
    $rw_tmp = pg_fetch_array($eje);
    $idel = $rw_tmp['id'];
    $id = $rw_tmp['id_entrada'];

        $sql = "UPDATE entrada SET compartir = '$option' WHERE id = '$id'";
        $eje = pg_query($dbcon, $sql);

            if(!$eje){
                echo "Error: No hemos podido ejecutar esta actualziacion";
            }
            else{
                $sql = "DELETE FROM tmp_entrada WHERE id = '$idel'";
                $eje = pg_query($dbcon, $sql);
                    if(!$eje){

                    }
                    else{
                        header("Location: diario.php");
                    }
                
            }


?>
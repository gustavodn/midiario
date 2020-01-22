<?php
    include('includes/db.php');
    include('auth.php');
    $usuario = $_SESSION['usuario'];
    $id = $_GET['id'];

        $sql = "DELETE FROM favorito WHERE usuario = '$usuario' AND id = '$id'";
        $eje = pg_query($dbcon, $sql) or die (pg_last_error());

            if(!$eje){
                echo "Error";
            }
            else{
                header("Location: muro2.php");
            }

?>
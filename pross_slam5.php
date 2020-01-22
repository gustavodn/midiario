<?php
include("includes/db.php");
include("auth.php");

        $usuario = $_SESSION['usuario'];

        $regla = $_POST['regla'];
        $grupo = $_POST['grupo'];
        $error = $_POST['error'];
        $regresarias = $_POST['regresarias'];
        $biografia = $_POST['biografia'];
        $vivir = $_POST['vivir'];
        $fin = $_POST['fin'];
        

            $sql = "SELECT id FROM slam WHERE usuario = '$usuario'";
            $eje = pg_query($dbcon, $sql);
            $count = pg_num_rows($eje);
            $ver = pg_fetch_array($eje);
            $fecha = date("d-m-Y");
            $hora = date("H:i:s");
            $id = $ver['id'];
                
                if($count > '0'){
                   
                    $sql = "UPDATE slam SET 
                    fecha_actualizacion = '$fecha',
                    hora_actualizacion = '$hora', 
                    regla = '$regla', 
                    grupo = '$grupo', 
                    error = '$error', 
                    regresarias = '$regresarias', 
                    biografia = '$biografia', 
                    vivir = '$vivir', 
                    fin = '$fin' 
                    WHERE id = '$id'";
                    $eje = pg_query($dbcon, $sql);

                        if(!$eje){
                            include("error_slam.php");
                        }
                        else{
                            include("finslam.php");
                        }
                }
?>
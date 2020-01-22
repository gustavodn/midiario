<?php
include("includes/db.php");
include("auth.php");

        $usuario = $_SESSION['usuario'];

        $sociedad = $_POST['sociedad'];
        $impresionante = $_POST['impresionante'];
        $no_volverias = $_POST['no_volverias'];
        $fisicamente = $_POST['fisicamente'];
        $sexo_opuesto = $_POST['sexo_opuesto'];
        $moda = $_POST['moda'];
        $orgullo = $_POST['orgullo'];
        

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
                    sociedad = '$sociedad', 
                    impresionante = '$impresionante', 
                    no_volverias = '$no_volverias', 
                    fisicamente = '$fisicamente', 
                    sexo_opuesto = '$sexo_opuesto', 
                    moda = '$moda', 
                    orgullo = '$orgullo' 
                    WHERE id = '$id'";
                    $eje = pg_query($dbcon, $sql);

                        if(!$eje){
                            include("error_slam.php");
                        }
                        else{
                            include("slam5.php");
                        }
                }
?>
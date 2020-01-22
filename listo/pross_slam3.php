<?php
include("includes/db.php");
include("auth.php");

        $usuario = $_SESSION['usuario'];

        $gustaria = $_POST['gustaria'];
        $preferida_pelicula = $_POST['preferida_pelicula'];
        $roto_corazon = $_POST['roto_corazon'];
        $dificil = $_POST['dificil'];
        $lugar_lindo = $_POST['lugar_lindo'];
        $amor_prohibido = $_POST['amor_prohibido'];
        $mejor_pasado = $_POST['mejor_pasado'];
        

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
                    gustaria = '$gustaria', 
                    preferida_pelicula = '$preferida_pelicula', 
                    roto_corazon = '$roto_corazon', 
                    dificil = '$dificil', 
                    lugar_lindo = '$lugar_lindo', 
                    amor_prohibido = '$amor_prohibido', 
                    mejor_pasado = '$mejor_pasado' 
                    WHERE id = '$id'";
                    $eje = pg_query($dbcon, $sql);

                        if(!$eje){
                            include("error_slam.php");
                        }
                        else{
                            include("slam4.php");
                        }
                }
?>
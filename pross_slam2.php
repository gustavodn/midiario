<?php
include("includes/db.php");
include("auth.php");

        $usuario = $_SESSION['usuario'];

        $amor = $_POST['amor'];
        $fobia = $_POST['fobia'];
        $cubierta = $_POST['cubierta'];
        $persona = $_POST['persona'];
        $extrano = $_POST['extrano'];
        $no_harias = $_POST['no_harias'];
        $prefieres = $_POST['prefieres'];
        

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
                    amor = '$amor', 
                    fobia = '$fobia', 
                    cubierta = '$cubierta', 
                    persona = '$persona', 
                    extrano = '$extrano', 
                    no_harias = '$no_harias', 
                    prefieres = '$prefieres' 
                    WHERE id = '$id'";
                    $eje = pg_query($dbcon, $sql);

                        if(!$eje){
                            include("error_slam.php");
                        }
                        else{
                            include("slam3.php");
                        }
                }
?>
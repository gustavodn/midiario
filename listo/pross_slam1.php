<?php
include("includes/db.php");
include("auth.php");

        $usuario = $_SESSION["usuario"];

        $diario = $_POST['diario'];
        $pregunta = $_POST['pregunta'];
        $logro = $_POST['logro'];
        $pelicula = $_POST['pelicula'];
        $regalo = $_POST['regalo'];
        $cancion = $_POST['cancion'];
        $pasatiempo = $_POST['pasatiempo'];

            $sql = "SELECT id FROM slam";
            $eje = pg_query($dbcon, $sql);
            $count = pg_num_rows($eje);

            $sql = "SELECT id FROM slam WHERE usuario = '$usuario'";
            $eje = pg_query($dbcon, $sql);
            $count2 = pg_num_rows($eje);
            $ver = pg_fetch_array($eje);
            $id = $ver['id'];
            $fecha = date("d-m-Y");
            $hora = date("H:i:s");
                
                if($count2 > '0'){
                    $sql = "UPDATE slam SET fecha_actualizacion = '$fecha', hora_actualizacion = '$hora', diario = '$diario', pregunta = '$pregunta', logro = '$logro', pelicula = '$pelicula', regalo = '$regalo', cancion = '$cancion', pasatiempo = '$pasatiempo' WHERE id = '$id'";

                    $eje = pg_query($dbcon, $sql);
                        if(!$eje){
                            include("error_slam.php");
                        }
                        else{
                            include("slam2.php");
                        }
                }
                else{
                    $id = $count + 1;
                    $sql = "INSERT INTO slam (id,usuario,fecha_creacion,hora_creacion,diario,pregunta,logro,pelicula,regalo,cancion,pasatiempo) 
                    VALUES ('$id','$usuario','$fecha','$hora','$diario','$pregunta','$logro','$pelicula','$regalo','$cancion','$pasatiempo')";
                    $eje = pg_query($dbcon, $sql)or die(pg_last_error());
                    echo $id;
                        if(!$eje){
                           
                            include("error_slam.php");
                        }
                        else{
                            include("slam2.php");
                        }
                }
?>
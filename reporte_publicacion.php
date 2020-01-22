<?php
    include("includes/db.php");
    include("auth.php");

    $usuario = $_SESSION['usuario'];
    $id_entrada = $_GET['id'];
    $fecha = date("d-m-Y");
    $bloqueo = 'x';

        $query1 = "SELECT reportes FROM entrada WHERE id = '$id_entrada'";
        $ejequery = pg_query($dbcon, $query1);
        $saber = pg_fetch_array($ejequery);
        $reportesact = $saber['reportes'];
        $add = $reportesact + 1;

            $sql = "UPDATE entrada SET reportes = '$add' WHERE id = '$id_entrada'";
            $eje = pg_query($dbcon, $sql)or die(pg_last_error());

                if(!$eje){
                    echo "Error";
                }
                else{
                    $sql = "SELECT * FROM reporte_publicacion";
                    $eje = pg_query($dbcon, $sql);
                        
                        if(!$eje){
                            echo "Error 2";
                        }
                        else{
                            $count = pg_num_rows($eje);
                            $id = generarCodigo(20);

                            $sql = "INSERT INTO reporte_publicacion (id, usuario,rp,id_entrada) VALUES ('$id','$usuario','x','$id_entrada')";
                            $eje = pg_query($dbcon, $sql);

                                if(!$eje){
                                    echo "Error 3";
                                }
                                else{
                                    header("Location: muro2.php");
                                }
                        }
                }
?>
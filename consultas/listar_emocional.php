<?php
include("../includes/db.php");
include("../auth.php");
    $usuario = $_SESSION['usuario'];
    $estado = $_POST['estado'];

    if($estado == 'all'){
        $sql = "SELECT * FROM entrada WHERE usuario = '$usuario' ORDER BY fecha DESC";
    }
    else{
        $sql = "SELECT * FROM entrada WHERE usuario = '$usuario' AND estadoanimo = '$estado' ORDER BY fecha DESC";
    }

    
    $eje = pg_query($dbcon, $sql);
    $count_entradas = pg_num_rows($eje);

                        while($rw_entradas = pg_fetch_array($eje)){
                            if($rw_entradas['compartir'] == 's'){
                                $compartir = 'Si';
                            }
                            else{
                                $compartir = 'No';
                            }
                            $estadoanimo = $rw_entradas['estadoanimo'];

                            $est_sql = "SELECT * FROM estadoanimo WHERE id = '$estadoanimo'";
                            $est_eje = pg_query($dbcon, $est_sql);
                            $est = pg_fetch_array($est_eje);
                            $estadoanimo = $est['estado'];
                            ?>
                        <div style="width: 25%; text-align:center; float:left;"><?php echo $rw_entradas['titulo']; ?></div>
                        <div style="width: 25%; text-align:center; float:left;"><?php echo $rw_entradas['fecha']; ?></div>
                        <div style="width: 25%; text-align:center; float:left;"><?php echo $estadoanimo; ?></div>
                        <div style="width: 25%; text-align:center; float:left;"><?php echo $compartir; ?></div>
                        <br>
                            <?php
                        }
                    ?>
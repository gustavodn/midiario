<?php
include("includes/db.php");
include("auth.php");

    $usuario = $_SESSION['usuario'];

    $sql = "SELECT * FROM entrada WHERE usuario = '$usuario' ORDER BY fecha DESC";
    $eje = pg_query($dbcon, $sql);
    $count_entradas = pg_num_rows($eje);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/diario.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script language="JavaScript" type="text/javascript" src="js/diario.js"></script>
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Quicksand" />
    <link href="https://fonts.googleapis.com/css?family=Tangerine:400,700&display=swap" rel="stylesheet">
    <title>Diario de <?php echo $usuario; ?></title>
</head>
<body>
<div class="barra-superior">
		<div class="bloque-derecho">
			<img src="img/ico_plu.png" height="100%" alt="">
		</div>
		<div class="volver">
			<a class="btn-opciones btn-opciones-ver" href="muro2.php">Volver</a>
        </div>
        <div class="bloque-izquierdo">
          <a href="opciones.php"><img src="img/opc.png" height="80%"></a>
        <a href="logout.php"><img src="img/logout.png" height="80%"></a>
    </div>
    </div>

    <div class="contener">
    <div class="derecha2">
			<img style="width: 50%; margin-left: 17%; margin-top:5%;" src="img/logo.png">

			<div style="width: 100%; margin-top:10%">
			<a href="nueva_entrada.php" class="btn-inicio btn-inicio-escribir">Escribir en tu diario</a>
			<a href="list_diario.php" class="btn-inicio btn-inicio-revisar">Revisar tu diario</a>
			</div>

        </div>

        <div class="izquierda3">
            <div class="contenedor-lista">
                <div class="barra-superior-lista">
                    <div class="titulo-diario">
                        Diario de Alexis
                    </div>
                    <div class="cantidad-entradas">
                        (
                            <?php 
                            if($count_entradas < '10'){
                                echo "0".$count_entradas;
                            }
                            else{
                                echo $count_entradas;
                            }
                            ?>
                        ) entradas en total
                    </div>
                        <select name="compartido" onchange="compartido();" class="select-filtros" id="compartido" style="margin-left:15%;">
                            <option value="">Compartido No Compartido</option>
                            <option value="s">Compartido</option>
                            <option value="n">No compartido</option>
                            <option value="am">Ambas</option>
                        </select>
                        <select name="estado" onchange="estado();" id="estado" class="select-filtros" id="">
                            <option value="">Estado Emocional</option>
                            <option value="all">Todos</option>
                            <?php
                            $sql_estados = "SELECT * FROM estadoanimo";
                            $eje_estados = pg_query($dbcon, $sql_estados);
                            while($rw_estados = pg_fetch_array($eje_estados)){
                            ?>
                                <option value="<?php echo $rw_estados['id'];?>"> <?php echo $rw_estados['estado']; ?> </option>
                            <?php
                            }
                            ?>
                            
                        </select>
                        
                        <input type="text" class="select-filtros">
                </div>
                <div class="titulo-lista">
                    <div style="width: 25%; text-align:center; float:left;">Entrada</div>
                    <div style="width: 25%; text-align:center; float:left;">Fecha</div>
                    <div style="width: 25%; text-align:center; float:left;">Estado</div>
                    <div style="width: 25%; text-align:center; float:left;">Compartido</div>
                </div>

                <div class="lista" id='lista'>
                    <?php
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
                </div>
            </div>
        </div>
    </div>


</body>
</html>
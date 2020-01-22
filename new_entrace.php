<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear Nueva entrada</title>
    <link rel="stylesheet" href="css/diario.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Quicksand" />
</head>
<body>
<div class="barra-superior">
		<div class="bloque-derecho">
			<img src="img/ico_plu.png" height="100%" alt="">
		</div>
		<div class="volver">
			<a class="btn-opciones btn-opciones-ver" href="muro2.php">Volver</a>
		</div>
    </div>


    <div class="contener">
    <script language="JavaScript" type="text/javascript" src="js/ajax.js"></script>
<form name="nueva_entrada" action="#" onsubmit="enviarDatosEmpleado(); return false">
		<div class="izquierda">
            
        <div class="bloque-datos">
            <div style="margin-left:80%; font-family:Quicksand; font-size:20px;"><?php echo date('d/m/Y'); ?></div>
            
            <input type="text" name="titulo" placeholder="Ingrese t&iacute;tulo" class="text-datos">
             Desea Recibir Comenatarios?
            <select name="comentario" id="" class="select-dia">
            <option value="s">Si</option>
            <option value="n">No</option>
        </select>

            

        <select name="etiqueta" id="" class="select-etiqueta">
        <option value="">Seleccione una etiqueta</option>
            <?php
                $sql = "SELECT id,etiqueta FROM etiqueta";
                $eje = pg_query($dbcon, $sql);
                while($rw_etiqueta = pg_fetch_array($eje)){
            ?>
            <option value="<?php echo $rw_etiqueta['id']; ?>"><?php echo $rw_etiqueta['etiqueta']; ?></option>
            <?php
                }
            ?>
        </select>

            <select name="estadoanimo" id="" class="select-estado">
                <option value="">Su estado de animo</option>
            <?php
                $sql2 = "SELECT id,estado FROM estadoanimo";
                $eje2 = pg_query($dbcon, $sql2);
                while($rw_estado = pg_fetch_array($eje2)){
            ?>
            <option value="<?php echo $rw_estado['id']; ?>"><?php echo $rw_estado['estado']; ?></option>
            <?php
                }
            ?>
            </select>
        </div>


            <textarea class="descripcion" name=""></textarea>

            <input type="submit" data-toggle="modal" data-target="#AddDate" class="btn-guardar btn-guardar-abajo" value="Guardar Entrada">
        </div>
        </form>
		<div class="derecha">
			<img style="width: 50%; margin-left: 17%; margin-top:5%;" src="img/logo.png">

			<div style="width: 100%; margin-top:10%">
			<a href="" class="btn-inicio btn-inicio-escribir">Escribir en tu diario</a>
			<a href="list_diario.php" class="btn-inicio btn-inicio-revisar">Revisar tu diario</a>
			</div>

			<img style="width: 70%; margin-left: 15%; margin-top:20%;" src="img/diario/texto.png">
        </div>
    
    </div>
    
    
</body>
</html>
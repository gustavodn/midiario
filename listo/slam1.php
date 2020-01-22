<script language="JavaScript" type="text/javascript" src="js/slam.js"></script>
<?php
include('includes/db.php');
include('auth.php');
$usuario = $_SESSION['usuario'];

$sql = "SELECT * FROM slam WHERE usuario = '$usuario'";
$eje = pg_query($dbcon, $sql);
$rw_slam = pg_fetch_array($eje);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SLAM - PAGINA 1</title>
    <link rel="stylesheet" href="css/slam.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Quicksand" />

</head>
<body>
    <div class="barra-superior">
        <div class="bloque-derecho">
            <img src="img/ico_plu.png" height="100%" alt="">
        </div>
        <div class="bloque-izquierdo">
          <a href="opciones.php"><img src="img/opc.png" height="80%"></a>
        <a href="logout.php"><img src="img/logout.png" height="80%"></a>
    </div>
    </div>

    <div class="desglose">
            <div class="izquierda">
                <img src="img/logo.png" style="padding-top: 3%; padding-left: 10%;">
            </div>
            <div class="derecha" id="derecha">
                <form name="slam_1" action="" onsubmit="enviarSlam1(); return false">
                ¿Alguna vez has escrito un diario?
                <input type="text" class="text-slam" name="diario" value="<?php echo $rw_slam['diario']; ?>"><br>
                ¿Cuál es la pregunta quemás te molesta que te hagan?<br>
                    <input type="text" class="text-slam" name="pregunta" value="<?php echo $rw_slam['pregunta']; ?>"><br>
                ¿Cuál es tu logro que mas enorgullese?<br>
                    <input type="text" class="text-slam" name="logro" value="<?php echo $rw_slam['logro']; ?>"><br>
                Si tu vida fuera una película ¿qué película sería? <br>
                    <input type="text" class="text-slam" name="pelicula" value="<?php echo $rw_slam['pelicula']; ?>"><br>
                ¿Cuál es el regalo más memorable que has recibido?<br>
                    <input type="text" class="text-slam" name="regalo" value="<?php echo $rw_slam['regalo']; ?>"><br>
                ¿Cuál es tu canción favoria?<br>
                    <input type="text" class="text-slam" name="cancion" value="<?php echo $rw_slam['cancion']; ?>"><br>
                ¿Cuál es tu mejor pasatiempo?<br>
                <input type="text" class="text-slam" name="pasatiempo" value="<?php echo $rw_slam['pasatiempo']; ?>"><br>
                <input type="submit" style="margin-left: 90%; margin-top: 5%;" class="btn-slam btn-slam-ver" name="Submit" value="Guardar (1 de 5)">
                </form>
            </div>
    </div>
</body>
</html>
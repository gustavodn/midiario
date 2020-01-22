<?php
include("includes/db.php");
include("auth.php");

$usuario = $_GET["usuario"];

$sql = "SELECT * FROM slam WHERE usuario = '$usuario'";
$eje = pg_query($dbcon, $sql);
$rw_slam = pg_fetch_array($eje);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="css/slam.css">
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Quicksand" />
</head>
<body>
	<div class="barra-superior">
		<div class="bloque-derecho">
			<img src="img/ico_plu.png" height="100%" alt="">
		</div>
		<div class="volver">
			<a href="">Volver</a>
		</div>
	</div>

	<div class="desglose">
		 <div class="derecha2" id="derecha">
                <img src="img/textoslam_ver.png"><bR>

¿Alguna vez has escrito un diario?
	<input type="text" class="text-slam" name="diario" value="<?php echo $rw_slam['diario']; ?>" disabled><br>

¿Cuál es la pregunta quemás te molesta que te hagan?<br>
	<input type="text" class="text-slam" name="pregunta" value="<?php echo $rw_slam['pregunta']; ?>" disabled><br>

¿Cuál es tu logro que mas enorgullese?<br>
    <input type="text" class="text-slam" name="logro" value="<?php echo $rw_slam['logro']; ?>" disabled><br>

Si tu vida fuera una película ¿qué película sería? <br>
    <input type="text" class="text-slam" name="pelicula" value="<?php echo $rw_slam['pelicula']; ?>" disabled><br>

¿Cuál es el regalo más memorable que has recibido?<br>
    <input type="text" class="text-slam" name="regalo" value="<?php echo $rw_slam['regalo']; ?>" disabled><br>

¿Cuál es tu canción favoria?<br>
    <input type="text" class="text-slam" name="cancion" value="<?php echo $rw_slam['cancion']; ?>" disabled><br>

¿Cuál es tu mejor pasatiempo?<br>
    <input type="text" class="text-slam" name="pasatiempo" value="<?php echo $rw_slam['pasatiempo']; ?>" disabled><br>.

En el amor ¿escuchas a tu corazón o a tu cerebro?
    <input type="text" class="text-slam" name="pasatiempo" value="<?php echo $rw_slam['amor']; ?>" disabled><br>

¿Cuál es tu mayor fobia? 
	<input class="text-slam" type="text" name="fobia" value="<?php echo $rw_slam['fobia']; ?>" disabled> <br>

¿Juzgas a un libro por su cubierta? 
	<input class="text-slam" type="text" name="cubierta" value="<?php echo $rw_slam['cubierta']; ?>" disabled> <br>

¿Quién te inspira a ser mejor persona y a superarte? 
	<input class="text-slam" type="text" name="persona" value="<?php echo $rw_slam['persona']; ?>" disabled> <br>

¿Qué es lo mas extraño que has visto? 
	<input class="text-slam" type="text" name="extrano" value="<?php echo $rw_slam['extrano']; ?>" disabled> <br>

¿Cuál es una de las cosas que jamás harías en tu vida? 
	<input class="text-slam" type="text" name="no_harias" value="<?php echo $rw_slam['no_harias']; ?>" disabled> <br>

¿Prefieres ahorrar o darte un gusto?
    <input type="text" class="text-slam" name="pasatiempo" value="<?php echo $rw_slam['prefieres']; ?>" disabled><br>

¿Sobre que tema te gustaría saber más? 
	<input class="text-slam" type="text" name="gustaria" value="<?php echo $rw_slam['gustaria']; ?>" disabled> <br>

¿Cuál es tu película favorita? 
	<input class="text-slam" type="text" name="preferida_pelicula" value="<?php echo $rw_slam['preferida_pelicula']; ?>"disabled><br>

¿Le rompiste el corazón a alguien?
	<input class="text-slam" type="text" name="dificil" value="<?php echo $rw_slam['roto_corazon']; ?>" disabled> <br>
     
¿Qué es lo más difícil que has hecho en tu vida? 
	<input class="text-slam" type="text" name="dificil" value="<?php echo $rw_slam['dificil']; ?>" disabled> <br>

¿Cuál es el lugar más lindo donde has estado? 
	<input class="text-slam" type="text" name="lugar_lindo" value="<?php echo $rw_slam['lugar_lindo']; ?>" disabled> <br>
	
¿Has tenido algún amor prohibido?
	<input class="text-slam" type="text" name="dificil" value="<?php echo $rw_slam['amor_prohibido']; ?>" disabled> <br>

¿Qué es lo mejor que te ha pasado hasta el momento? 
	<input class="text-slam" type="text" name="mejor_pasado" value="<?php echo $rw_slam['mejor_pasado']; ?>" disabled> <br>

¿Qué piensas de la sociedad actual? 
	<input class="text-slam" type="text" name="sociedad" value="<?php echo $rw_slam['sociedad']; ?>" disabled> <br>
    
¿Qué es lo más impresionante que sabes hacer? 
	<input class="text-slam" type="text" name="impresionante" value="<?php echo $rw_slam['impresionante']; ?>" disabled> <br>

¿Qué es lo que nunca volverías a hacer? 
	<input class="text-slam" type="text" name="no_volverias" value="<?php echo $rw_slam['no_volverias']; ?>" disabled> <br>

Físicamente hablando ¿Qué crees que ven primero las personas de ti? 
	<input class="text-slam" type="text" name="fisicamente" value="<?php echo $rw_slam['fisicamente']; ?>" disabled> <br>

¿Qué es lo que más te atrae de una persona del sexo opuesto al tuyo?  
	<input class="text-slam" type="text" name="sexo_opuesto" value="<?php echo $rw_slam['sexo_opuesto']; ?>" disabled> <br>

¿Qué moda o tendencia te gustaría que regrese? 
	<input class="text-slam" type="text" name="moda" value="<?php echo $rw_slam['moda']; ?>" disabled> <br>

¿Te consideras una persona orgullosa?
    <input class="text-slam" type="text" name="sociedad" value="<?php echo $rw_slam['orgullo']; ?>" disabled> <br>

Si pudieras implantar una regla que todos deberíamos de seguir ¿cuál sería? 
	<input class="text-slam" type="text" name="regla" value="<?php echo $rw_slam['regla']; ?>" disabled> <br>

En tu grupo de amigos ¿qué papel juegas? 
	<input class="text-slam" type="text" name="grupo" value="<?php echo $rw_slam['grupo']; ?>" disabled> <br>

¿Cuál es el error que más número de veces has cometido? 
    <input class="text-slam" type="text" name="error" value="<?php echo $rw_slam['error']; ?>" disabled> <br>

Si tuvieras el poder de regresar el tiempo ¿a que momento de tu vida regresarías? 
<input class="text-slam" type="text" name="regresarias" value="<?php echo $rw_slam['regresarias']; ?>" disabled> <br>

¿Escribirías un libro sobre tu vida?
    <input class="text-slam" type="text" name="regresarias" value="<?php echo $rw_slam['biografia']; ?>" disabled> <br>

¿Dónde te gustaria vivir? 
	<input class="text-slam" type="text" name="vivir" value="<?php echo $rw_slam['vivir']; ?>" disabled> <br>

Llegó el fin de semana ¿Prefieres salir o quedarte en casa?
    <input class="text-slam" type="text" name="vivir" value="<?php echo $rw_slam['fin']; ?>" disabled> <br>

            </div>
		<div class="izquierda2">
                <img src="img/logo.png" style="padding-top: 3%; padding-left: 10%;">
            </div>
	</div>
</body>
</html>
<?php
	include("includes/db.php");
	include("auth.php");

	$usuario = $_SESSION['usuario'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Diario de @<?php echo $usuario; ?></title>
	<link rel="stylesheet" href="css/diario.css">
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Quicksand" />
</head>
<body>
	<div class="barra-superior">
		<div class="bloque-derecho">
			<img src="img/ico_plu.png" height="100%" alt="">
		</div>
		<div class="volver">
			<a href="muro2.php">Volver</a>
		</div>
	</div>

	<div class="contener">
		<div class="izquierda2">
			
		</div>
		<div class="derecha">
			<img style="width: 50%; margin-left: 17%; margin-top:5%;" src="img/logo.png">

			<div style="width: 100%; margin-top:10%">
			<a href="nueva_entrada.php" class="btn-inicio btn-inicio-escribir">Escribir en tu diario</a>
			<a href="list_diario.php" class="btn-inicio btn-inicio-revisar">Revisar tu diario</a>
			</div>

			<img style="width: 80%; margin-left: 5%; margin-top:20%;" src="img/diario/texto.png">
		</div>
	</div>
</body>
</html>
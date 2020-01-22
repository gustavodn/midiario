<?php
include("includes/db.php");
include("auth.php");

$usuario = $_SESSION["usuario"];
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
			<a href="muro2.php">Volver</a>
		</div>
	</div>

	<div class="desglose">
		<div class="logo" style="margin-bottom: 10px;">
			<img src="img/logo.png" alt="" style="margin-left: 40%;" width="20%">
		</div>

		<div class="usuario"> Hola <strong><?php echo $usuario; ?></strong> </div>

		<img src="img/texto.png" style="margin-left: 20%; margin-top: 5%;" width="60%">

		<div style="margin-left: 30%; margin-top: 5%;"> <a href="slam1.php" class="btn-slam btn-slam-ver">Ingresar al <strong>SLAM</strong></a> <a href="ver_slam.php?usuario=<?php echo $usuario; ?>" class="btn-slam btn-slam-ver">Ver <strong>SLAM</strong></a> </div>
	</div>
</body>
</html>
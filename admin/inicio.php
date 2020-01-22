<?php
session_start();
if(!isset($_SESSION["usuario_admin"])){
header("Location: index.php");
exit(); }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Panel de Administracion</title>
	<link rel="stylesheet" href="admin.css">
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Quicksand" />
</head>
<body>
	<div class="menu-admin">
		<img src="img/logopaneladministrativo.png" width="90%" style=" margin-left: 5%; margin-top: 10px;" />
		<div class="linea" style=" margin-left: 5%;"><img src="img/linea.png" alt="" width="90%"></div>
		<div class="text-menu"><a href="lista_usuarios.php">USUARIOS</a></div>
		<div class="linea" style="margin-left: 5%;"><img src="img/linea.png" alt="" width="90%"></div>
		<div class="text-menu"><a href="lista_etiquietas.php">ETIQUETAS</a></div>
		<div class="linea" style=" margin-left: 5%;"><img src="img/linea.png" alt="" width="90%"></div>
		<div class="text-menu"><a href="lista_estados.php">ESTADOS DE ANIMO</a></div>
		<div class="linea" style=" margin-left: 5%;"><img src="img/linea.png" alt="" width="90%"></div>

		<div class="logout">
				<div class="linea" style="margin-left: 5%;"><img src="img/linea.png" alt="" width="90%"></div>
				<a href="logout.php" class="text-menu"><div class="text-menu">CERRAR SESION</div></a>
				<div class="linea" style=" margin-left: 5%;"><img src="img/linea.png" alt="" width="90%"></div>
		</div>
	</div>


	<div class="desglose"></div>
</body>
</html>

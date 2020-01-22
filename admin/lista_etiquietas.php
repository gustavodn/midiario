<?php
session_start();
if(!isset($_SESSION["usuario_admin"])){
header("Location: index.php");
exit(); }

include("../includes/db.php");

$sql = "SELECT * FROM etiqueta";
$eje = pg_query($dbcon, $sql);
$count = pg_num_rows($eje);

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
		<div class="linea" style=" margin-left: 10%;"><img src="img/linea.png" alt="" width="90%"></div>
		<div class="text-menu"><a href="lista_usuarios.php">USUARIOS</a></div>
		<div class="linea" style="margin-left: 10%;"><img src="img/linea.png" alt="" width="90%"></div>
		<div class="text-menu"><a href="lista_etiquietas.php">ETIQUETAS</a></div>
		<div class="linea" style=" margin-left: 10%;"><img src="img/linea.png" alt="" width="90%"></div>
		<div class="text-menu"><a href="lista_estados.php">ESTADOS DE ANIMO</a></div>
		<div class="linea" style=" margin-left: 10%;"><img src="img/linea.png" alt="" width="90%"></div>

		<div class="logout">
				<div class="linea" style="margin-left: 5%;"><img src="img/linea.png" alt="" width="85%"></div>
				<a href="logout.php" class="text-menu"><div class="text-menu">CERRAR SESION</div></a>
				<div class="linea" style=" margin-left: 5%;"><img src="img/linea.png" alt="" width="85%"></div>
		</div>
	</div>


	<div class="desglose">
		<div class="titulo">Lista de Etiquetas (<?php echo $count; ?>)  <a href="nueva_etiqueta.php">Agregar Etiqueta</a></div>
		<table width="80%" style="text-align: left; font-size: 15px;" class="tabla">
			<thead>
				<tr>
					<th width="25%">Etiqueta</th>
					<th width="25%">Registrado por</th>
					<th width="25%">Fecha</th>
					<th width="25%"></th>
				</tr>
			</thead>
			<tbody>
			</tbody>
			<?php
				while($rw_usuarios = pg_fetch_array($eje)){
					$id = $rw_usuarios['id'];
			?>
				<tr>
					<td><?php echo $rw_usuarios['etiqueta']; ?></td>
					<td><?php echo $rw_usuarios['quien']; ?></td>
					<td><?php echo $rw_usuarios['cuando']; ?></td>
					<td><a href="delete_etiqueta.php?id=<?php echo $id; ?>">Eliminar</a></td>
				</tr>
				<?php
			}
				?>
			</tbody>
		</table>

	</div>
</body>
</html>

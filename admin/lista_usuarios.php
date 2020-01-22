<?php
session_start();
if(!isset($_SESSION["usuario_admin"])){
header("Location: index.php");
exit(); }

include("../includes/db.php");

$sql = "SELECT * FROM md_user";
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
				<div class="linea" style="margin-left: 5%;"><img src="img/linea.png" alt="" width="90%"></div>
				<a href="logout.php" class="text-menu"><div class="text-menu">CERRAR SESION</div></a>
				<div class="linea" style=" margin-left: 5%;"><img src="img/linea.png" alt="" width="90%"></div>
		</div>
	</div>


	<div class="desglose">
		<div class="titulo">Lista de Usuarios (<?php echo $count; ?>)</div>
		<table width="80%" style="text-align: left; font-size: 15px;" class="tabla">
			<thead>
				<tr>
					<th width="25%">Apodo</th>
					<th width="25%">Pais</th>
					<th width="25%">Sexo</th>
					<th width="25%">Signo Zodiacal</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
			<?php
				while($rw_usuarios = pg_fetch_array($eje)){
					$id = $rw_usuarios['id'];
					$pais = $rw_usuarios['pais'];
			?>
				<tr>
					<td><?php echo $rw_usuarios['usuario']; ?></td>
					<?php
						$sql2 = "SELECT * FROM relacion_pais WHERE pais = '$pais'";
						$sql22 = pg_query($dbcon, $sql2);
						$pais = pg_fetch_array($sql22);
						$pais = $pais['imagen'];
					?>

					<td><img src="../img/banderas/<?php echo $pais; ?>" alt="" width="30px"></td>
					<td>
						<?php
						if($rw_usuarios['sexo'] == '1'){
							echo "Hombre";
						}
						elseif($rw_usuarios['sexo'] == '2'){
							echo "Mujer";
						}
						elseif($rw_usuarios['sexo'] == '3'){
							echo "Hombre Indefinido";
						}
						else{
							echo "Mujer Indefinida";
						}
						?>


					</td>
					<td style="text-transform: capitalize;"><?php echo $rw_usuarios['signo']; ?></td>
				</tr>
				<?php
			}
				?>
			</tbody>
		</table>

	</div>
</body>
</html>

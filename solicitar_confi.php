<?php
include ('includes/db.php');
include ('auth.php');

$solicitante = $_SESSION['usuario'];
$solicitado = $_GET['usuario'];

	$sql = "SELECT * FROM solicitud_confidente WHERE solicitante = '$solicitante' AND solicitado = '$solicitado'";
	$eje = pg_query($dbcon, $sql);
	$count = pg_num_rows($eje);
		if($count > '0'){
			header("Location: murouser.php?usuario=$solicitado");
		}
		else{
			$sql = "SELECT * FROM solicitud_confidente WHERE solicitado = '$solicitado' AND solicitante = '$solicitante'";
			$eje = pg_query($dbcon, $sql);
			$count = pg_num_rows($eje);
				if($count > '0'){
				header("Location: murouser.php?usuario=$solicitado");
				}
				else{
					$sql = "SELECT * FROM solicitud_confidente";
					$eje = pg_query($dbcon, $sql);
					$count = pg_num_rows($eje);

					$id = generarCodigo(20);
					$sql="INSERT INTO 
					solicitud_confidente (id,solicitante,solicitado,estado) 
						 		  VALUES ('$id','$solicitante','$solicitado','no')";
					$eje = pg_query($dbcon, $sql);

						if(!$eje){
							echo "Errror";
						}
						else{
							header("Location: murouser.php?usuario=$solicitado");
						}
				}

		}
?>
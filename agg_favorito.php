<?php
	include ('includes/db.php');
	include ('auth.php');

		$id_entrada = $_GET['id'];
		$usuario = $_SESSION['usuario'];
			$sql = "SELECT * FROM favorito";
			$eje = pg_query($dbcon, $sql);
			$count = pg_num_rows($eje);
			$id = generarCodigo(20);
			$sql = "INSERT INTO favorito (id,id_entrada,usuario,favorito) VALUES ('$id','$id_entrada','$usuario','x')";
			$eje = pg_query($dbcon, $sql) or die(pg_last_error());

				if(!$eje){
					echo "Error";
				}
				else{
					header("Location: muro2.php");
				}

?>
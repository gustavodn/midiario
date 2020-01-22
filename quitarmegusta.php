<?php
	include("includes/db.php");
	include("auth.php");

	$usuario = $_SESSION['usuario'];
	$id = $_GET['id'];

		$sql = "SELECT megusta FROM entrada WHERE id = '$id'";
		$eje = pg_query($dbcon, $sql);
		$ver = pg_fetch_array($eje);
		$megusta = $ver['megusta'];
		$add = $megusta - 1;

				$sql = "UPDATE entrada SET megusta = '$add' WHERE id = '$id'";
				$eje = pg_query($dbcon, $sql);

					if(!$eje){
						echo "Error2";
					}
					else{
						$sql = "DELETE FROM megusta WHERE usuario = '$usuario' AND id_entrada = '$id' ";
						$eje = pg_query($dbcon, $sql);
								if(!$eje){
									echo "Error 3";
								}
								else{
									header("Location: muro2.php");
								}
					}

?>
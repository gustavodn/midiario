<?php
	include("includes/db.php");
	include("auth.php");

	$usuario = $_SESSION['usuario'];
	$id = $_GET['id'];

		$sql = "SELECT mg FROM comentarios WHERE id = '$id'";
		$eje = pg_query($dbcon, $sql);
		$ver = pg_fetch_array($eje);
		$megusta = $ver['mg'];
		$add = $megusta - 1;

			if(!$eje){
				echo "Error";
			}
			else{
				$sql = "UPDATE comentarios SET mg = '$add' WHERE id = '$id'";
				$eje = pg_query($dbcon, $sql);

					if(!$eje){
						echo "Error2";
					}
					else{
						
							$sql = "DELETE FROM megusta_comentario WHERE id_comentario = '$id' AND usuario = '$usuario'";
							$eje = pg_query($dbcon, $sql) or die(pg_last_error());

								if(!$eje){
									echo "Error 3";
								}
								else{
									header("Location: muro2.php");
								}
					}
			}

?>
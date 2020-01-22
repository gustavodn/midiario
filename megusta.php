<?php
	include("includes/db.php");
	include("auth.php");

	$usuario = $_SESSION['usuario'];
	$id = $_GET['id'];

		$sql = "SELECT megusta FROM entrada WHERE id = '$id'";
		$eje = pg_query($dbcon, $sql);
		$ver = pg_fetch_array($eje);
		$megusta = $ver['megusta'];
		$add = $megusta + 1;

			if(!$eje){
				echo "Error";
			}
			else{
				$sql = "UPDATE entrada SET megusta = '$add' WHERE id = '$id'";
				$eje = pg_query($dbcon, $sql);

					if(!$eje){
						echo "Error2";
					}
					else{
						$idnew = generarCodigo(20);

							$sql = "INSERT INTO megusta (id,usuario,mg,id_entrada) VALUES ('$idnew','$usuario','x','$id')";
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
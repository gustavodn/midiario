<?php
	include("includes/db.php");
	include("auth.php");

		$usuario = $_SESSION['usuario'];
		$sobremi = $_POST['sobremi'];

			$sql = "SELECT * FROM sobremi";
			$eje = pg_query($dbcon, $sql);
			$count = pg_num_rows($eje);
			$id = $count + 1;

			$sql = "SELECT * FROM sobremi WHERE usuario = '$usuario'";
			$eje = pg_query($dbcon, $sql);
			$count2 = pg_num_rows($eje);

				if($count2 > '0'){
					$sql = "UPDATE sobremi SET sobremi = '$sobremi' WHERE usuario = '$usuario'";
					$eje = pg_query($dbcon, $sql) or die(pg_last_error());

					if(!$eje){
					echo "error";
					}
					else{
						header("Location: muro2.php");
					}

				}
				else{
					$sql = "INSERT INTO sobremi (id,usuario,sobremi) VALUES ('$id','$usuario','$sobremi')";
			$eje = pg_query($dbcon, $sql) or die(pg_last_error());

				if(!$eje){
					echo "error";
				}
				else{
					header("Location: muro2.php");
				}
				}


			
?>
<?php
include("../includes/db.php");
$usuario = $_POST['usuario'];
$clave = $_POST['clave'];
$clave = sha1($clave);

	$sql = "SELECT * FROM admin WHERE usuario = '$usuario' AND clave = '$clave'";
	$eje = pg_query($dbcon, $sql);
	$saber = pg_fetch_array($eje);

		if(!$eje){
			echo "Error";
		}
		else{
				$count = pg_num_rows($eje);

				if($count==1){
					session_start();
                            $_SESSION['usuario_admin'] = $saber['usuario'];
                            $_SESSION['correo'] = $saber['correo'];
                            $_SESSION['nombre'] = $saber['nombre'];
                            
                            header("Location: inicio.php"); // Redirect user to index.php
				}
				else{
					echo "No hay usuario con esos datos";
				}
			
		}

?>
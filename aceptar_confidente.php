<?php
	include ('includes/db.php');
	include ('auth.php');

	$id = $_GET['id'];

		$sql = "UPDATE solicitud_confidente SET estado = 'si' WHERE id = '$id'";
		$eje = pg_query($dbcon, $sql);

			if(!$eje){
				echo "Error";
			}
			else{
				$sql = "SELECT * FROM solicitud_confidente WHERE id = '$id'";
				$eje = pg_query($dbcon, $sql);

					if(!$eje){
						echo "Error 2";
					}
					else{
						$rw_solicitud = pg_fetch_array($eje);
						$confidente1 = $rw_solicitud['solicitante'];
						$confidente2 = $rw_solicitud['solicitado'];

						$sql = "SELECT * FROM confidente";
						$eje = pg_query($dbcon, $sql);
						$count = pg_num_rows($eje);
						$id = generarCodigo(20);

							$sql = "INSERT INTO confidente (id,confidente1,confidente2) VALUES ('$id','$confidente1','$confidente2')";
							$eje = pg_query($dbcon, $sql);

								if(!$eje){
									echo "Error 3";
								}
								else{
									$sql = "SELECT * FROM confidente";
									$eje = pg_query($dbcon, $sql);
									$count = pg_num_rows($eje);
									$id = generarCodigo(20);

										$sql = "INSERT INTO confidente (id,confidente1,confidente2) VALUES ('$id','$confidente2','$confidente1')";
										$eje = pg_query($dbcon, $sql);

											if(!$eje){
												echo "Error 4";
											}
											else{
												header("location: murouser.php?usuario=$confidente1");
											}
								}
					}
			}
?>
<?php
  include('includes/db.php');
  include('auth.php');


  $usuario = $_SESSION['usuario'];

  			  //Busca todos los usuarios seguidos
              $sql = "SELECT * FROM seguido WHERE seguidopor = '$usuario'";
              $eje = pg_query($dbcon, $sql);
              $codigo = generarCodigo(20);
              $seguidos = pg_num_rows($eje);

              	//Los muestra y repite
                while ($rw_seguidos = pg_fetch_array($eje)) {
                	$user = $rw_seguidos['seguido'];
                	// busca todas las publicaciones (publicas) por cada uno de los usuarios seguidos
                	$sql2 = "SELECT * FROM entrada WHERE usuario = '$user'";
                	$eje2 = pg_query($dbcon, $sql2);

                		while($rw_entradasuser = pg_fetch_array($eje2)){
                			$id_entrada = $rw_entradasuser['id'];
                			$fecha = $rw_entradasuser['fecha'];
                			$id = $codigo;

                				$sql55 = "INSERT INTO tmp_proceso (id_proceso,id_entrada,fecha) VALUES ('$id','$id_entrada','$fecha')";
                				$eje55 = pg_query($dbcon, $sql55);
                		}
                	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Seguidos por @<?php echo $_SESSION['usuario']; ?> </title>
	<link rel="stylesheet" href="css/seguidos.css">
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Quicksand" />
	<script language="JavaScript" type="text/javascript" src="js/jquery.min.js"></script>
	<script language="JavaScript" type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>
	<div class="barra-superior">
		<div class="bloque-derecho">
			<img src="img/ico_plu.png" height="100%" alt="">
		</div>
		<div class="volver">
			<a href="muro2.php">Volver</a>
		</div>
	</div>

	<div class="contener">

	<div class="izquierda">
		<div style="color: #880015; font-size: 35px; margin-left: 25%; margin-top: 5%;">Lista de Seguidos</div>
		<hr>
		<div class="usuarios">
			<?php
              $sql = "SELECT * FROM seguido WHERE seguidopor = '$usuario'";
              $eje = pg_query($dbcon, $sql);
                while ($rw_seguidos = pg_fetch_array($eje)) {
            ?>
			<div class="usuario-sex"><img src="img/sexos/masculino2.png" alt="" width="70%"></div>
			<div class="usuario-izq">@<?php echo $rw_seguidos['seguido']; ?></div>
			<div class="usuario-der"><img src="img/banderas/pe.png" alt="" width="40%"></div><br>
			<hr>
			<?php
              }
            ?>
			
		</div>
	</div>

	<div class="derecha">
		<?php
			$sql = "SELECT * FROM tmp_proceso WHERE id_proceso = '$codigo' ORDER BY fecha DESC";
			$eje = pg_query($dbcon, $sql);
			
			while ($rw_proceso = pg_fetch_array($eje)) {
				$id_entrada = $rw_proceso['id_entrada'];
				$sql25 = "SELECT * FROM entrada WHERE id = '$id_entrada'";
				$eje25 = pg_query($dbcon, $sql25);	
				$rw_entradapro = pg_fetch_array($eje25);

				$desarrollo = $rw_entradapro['desarrollo'];
				$fecha = $rw_entradapro['fecha'];
		?>
		<div class="publicacion">

			<div class="superior">
				<div class="sexoser">
				<img src="img/sexos/femenino2.png" width="100%" alt="">
				</div>

				<div class="usuario">
					<div class="user">@usuario</div>
					<div class="etiqueta">#etiqueta</div>
				</div>

				<div class="signo">
					<img src="img/signostext/acuario.png" width="100%" style="float: left; margin-bottom: 5px;" alt="">
					<div class="etiqueta"></div>
				</div>
				<div class="favorito">
					<img src="img/fav_act.png" width="100%">
					<div class="etiqueta"></div>
				</div>
			</div>


			<div class="centro">
				<div class="pais">
					<img src="img/banderas/pe.png" width="80%" style="margin-left: 10%; margin-top: -3px; padding-top: -2;">
				</div>
				<div class="desarrollo">
					<?php 
				echo substr($desarrollo, 0, 300); 
				if(strlen($desarrollo) > '300'){
				?> 
				<a href="" class="openBtn2">... Ver Mas</a>
			<?php } ?>
				</div>
				
			</div>
			<div class="footer">
				<div id='comentar' style="width: 4%; float:left; margin-right: 5px;"><img src="img/reportarinactivo.png" width="100%"></div>
				<div id='mg' style="width: 4%; float:left; margin-right: 5px;"><img src="img/mg.png" width="100%"></div>
				<div id='nmg' style="width: 4%; float:left; margin-right: 5px;"><img src="img/nmg.png" width="100%"></div>
				<div id='reportar' style="width: 4%; float: left; margin-right: 5px;"><img src="img/reportarinactivo.png" width="100%"></div>
			</div>
			
		</div>

		<?php
			}

			$sql = "DELETE FROM tmp_proceso WHERE id_proceso = '$codigo'";
			$eje = pg_query($dbcon, $sql);
			?>

	</div>
	</div>

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<div class="modal fade" id="bootstrap-modal" role="dialog" width="100%;">
        <div class="modal-dialog" role="document" width="100%"> 
          <!-- Modal contenido-->
          <div class="modal-content">
            <div class="modal-body" style="font-size: 20px;">
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>
    <script>
	$('.openBtn2').on('click',function(e){
		e.preventDefault();
		$('.modal-body').load('mostrar_publicacion.php?id=1',function(){
			$('#bootstrap-modal').modal({show:true});
		});
	});
	</script>
</html>

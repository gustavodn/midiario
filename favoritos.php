<?php
  include('includes/db.php');
  include('auth.php');


  $usuario2 = $_SESSION['usuario'];

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Seguidores de @<?php echo $_SESSION['usuario']; ?> </title>
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

	<div class="izquierda">
	</div>

	<div class="derecha">
		<?php
            $sql = "SELECT * FROM favorito WHERE usuario = '$usuario2'";
          		$eje89 = pg_query($dbcon, $sql);

          		while ($rw_favorito = pg_fetch_array($eje89)) {
                $id = $rw_favorito['id_entrada'];
                $sql52 = "SELECT * FROM entrada WHERE id = '$id'";
                $eje = pg_query($dbcon, $sql52)or die(pg_last_error());
                $rw_entradas = pg_fetch_array($eje);
                $desarrollo = $rw_entradas['desarrollo'];
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
				<?php
              $sql23 = "SELECT * FROM favorito WHERE id_entrada = '$id' AND favorito = 'x' AND usuario = '$usuario2'";
              $eje23 = pg_query($dbcon, $sql23);
              $count23 = pg_num_rows($eje23);
              $ver23 = pg_fetch_array($eje23);
              $id_fav = $ver23['id'];
              if($count23 > '0'){
              ?>
          <a href="quitar_favorito.php?id=<?php echo $id_fav; ?>"><img src="img/fav_act.png" width="100%"></a>
          <?php } 
              else{
                ?>
                <a href="agg_favorito.php?id=<?php echo $id; ?>"><img src="img/fav.png" width="100%"></a>
                <?php
              }
              ?>
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
	?>
	</div>

<div class="modal fade" id="bootstrap-modal" role="dialog" width="100%;">
        <div class="modal-dialog" role="document" width="100%"> 
          <!-- Modal contenido-->
          <div class="modal-content">
            <div class="modal-body" style="font-size: 20px;">
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn-opciones btn-opciones-ver" data-dismiss="modal">Cerrar</button>
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
   <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
   <link href="../css/bootstrap.min.css" rel="stylesheet">
   <link href="../css/midiario.css" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Quicksand" />
  <?php
  include("../includes/db.php");
  session_start();
if(isset($_SESSION["usuario_admin"])){
		$modal = "hide";
}
    else{
        $modal = "show";
}

if(!isset($_SESSION["usuario_admin"])){ }
else{
  header("Location: inicio.php");
}
?>
<script>
      $(document).ready(function()
      {
         $("#mostrarmodal").modal("<?php echo $modal; ?>");
      });
</script>

<div class="modal fade" id="mostrarmodal" tabindex="-1″ role="dialog" aria-labelledby="basicModal" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-body">
<h3>Inicie Sesion</h3>
<?php echo $sms, $_SESSION['usuario_admin']; ?>
<form action="iniciar.php" method="post">
	<input type="text" class="btn-comentar" style="margin-left:20%;" name="usuario" placeholder="Usuario">
	<input type="password" class="btn-comentar" style="margin-left:20%;" name="clave" placeholder="Clave">
	<br>
	<input type="submit" value="Iniciar Sesion" class="btn-opciones btn-opciones-ver" style="margin-left: 55%">
</form>
</div>
</div>
</div>
</div>
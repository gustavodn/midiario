<?php
include("includes/db.php");
include('auth.php');

$titulo = $_POST['titulo'];
$etiqueta = $_POST['etiqueta'];
$estadoanimo = $_POST['estadoanimo'];
$desarrollo = $_POST['desarrollo'];
$usuario = $_SESSION['usuario'];
$hora = date("H:i:s");
$fecha = date("d-m-Y");
$comentario = $_POST['comentario'];

$id = generarCodigo(20);

$sql = "INSERT INTO entrada (id,titulo,etiqueta,estadoanimo,desarrollo,usuario,fecha,hora,comentario,megusta,nomegusta,reportes) 
        VALUES ('$id','$titulo','$etiqueta','$estadoanimo','$desarrollo','$usuario','$fecha','$hora','$comentario','0','0','0')";
$eje = pg_query($dbcon, $sql)or die(pg_last_error());

if(!$eje){
    include("error_entrada.php");
}
else{
    $idact = generarCodigo(20);
    $sql = "INSERT INTO tmp_entrada (id,usuario,id_entrada) VALUES ('$idact','$usuario','$id')";
    $eje = pg_query($dbcon, $sql) or die (pg_last_error());
    if(!$eje){
        echo "error";
    }
}

$modal = "show";
?>

<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/diario.css">
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Quicksand" />
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
<h3>Desea usted que esta entrada <br>sea publica?</h3>
<form action="confirmar.php" method="post">
<input type="radio" name="opciones" id="opciones_1" value="s" checked>Si<br>
<input type="radio" name="opciones" id="opciones_2" value="n">No<br>


<input type="submit" value="Confirmar" class="btn-inicio btn-inicio-escribir" style="width: auto; margin-left:25%; padding:5px;">
</form>
</div>
</div>
</div>
</div>
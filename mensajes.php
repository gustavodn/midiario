<?php
include('includes/db.php');
include('auth.php');
$usuario = $_SESSION['usuario'];

$id = $_GET['id'];
$sql_mes = "SELECT * FROM mensajes WHERE id_conversacion = '$id'";
$eje_mes = pg_query($dbcon, $sql_mes) or die (pg_last_error());

    while($rw_mensajes = pg_fetch_array($eje_mes)){
        $de = $rw_mensajes['de'];
if($de == $usuario){
?>
<div class="mensaje-gris"><?php echo $rw_mensajes['mensaje']; ?></div>
<?php
}
else{
?>
<div class="mensaje-rosa"><?php echo $rw_mensajes['mensaje']; ?></div>
<?php
    }
}
    ?>
    <span id="final"></span>
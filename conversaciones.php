<?php
    include('includes/db.php');
    include('auth.php');
    $usuario = $_SESSION['usuario'];
    
        $id = $_GET['id'];

            $sql_con = "SELECT * FROM conversaciones WHERE id_conversacion = '$id' AND usuario1 = '$usuario'";
            $eje_con = pg_query($dbcon, $sql_con);
            $array_con = pg_fetch_array($eje_con);

                $conversacon = $array_con['usuario2'];

                    echo "<h1 style='color: #880015;'>Conversas con: ".$conversacon."</h1>";
?>
<html>
<title>Conversaciones <?php echo $usuario; ?></title>
<body>
<script language="JavaScript" type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript">
  var refresh = setInterval(
  (function () {
      $("#mensajes").load("mensajes.php?id=<?php echo $id; ?>"); 
  }), 1000);
</script>
<div id="mensajes">
<?php
$sql_mes = "SELECT * FROM mensajes WHERE id_conversacion = '$id'";
$eje_mes = pg_query($dbcon, $sql_mes);

    while($rw_mensajes = pg_fetch_array($eje_mes)){
        $de = $rw_mensajes['de'];
if($de == $usuario){
?>
<div style=" width: 100%; text-align: right; height:30px; background-color:#dfdede;"><?php echo $rw_mensajes['mensaje']; ?></div>
<?php
}
else{
?>
<div style="width: 100%; height:30px; background-color:#f0cece; "><?php echo $rw_mensajes['mensaje']; ?></div>
<?php
    }
}
    ?>
</div>

<div id='env_mensaje' style="margin-top: 25px">
<form name="mensajes" action="pross_mensaje.php" method="POST">
Tu mensaje: <input type="text" name="mensaje"> 
<input type="text" name="de" value="<?php echo $usuario; ?>" hidden> 
<input type="text" name="conversacion" value="<?php echo $id; ?>" hidden> 
<input type="text" name="para" value="<?php echo $conversacon; ?>" hidden>
<input type="submit" value="Enviar">
</form>

</div>
</body>
</html>
<?php
include('includes/db.php');
include('auth.php');

$usuario = $_SESSION['usuario'];
$id = $_GET['id'];

if (isset($_GET['id'])) { 
  $mensajes = 'si';
            $sql_con = "SELECT * FROM conversaciones WHERE id_conversacion = '$id' AND usuario1 = '$usuario'";
            $eje_con = pg_query($dbcon, $sql_con);
            $array_con = pg_fetch_array($eje_con);

            $conversacon = $array_con['usuario2'];

            $sql_usu = "SELECT * FROM md_user WHERE usuario = '$conversacon'";
            $eje_usu = pg_query($dbcon, $sql_usu);
            $ver_usu = pg_fetch_array($eje_usu);
            $sexo = $ver_usu['sexo'];

            if($sexo == 'm'){
              $img_sex = 'femenino2.png';
            }
            elseif($sexo == 'mi'){
              $img_sex = 'femeninointerrogativo2.png';
            }
            elseif($sexo == 'h'){
              $img_sex = 'masculino2.png';
            }
            elseif($sexo == 'hi'){
              $img_sex = 'masculinointerrogativo2.png';
            }
}
else{
  $mensajes = 'no';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Privados</title>
  <link rel="stylesheet" href="css/privados.css">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Quicksand" />
  <script language="JavaScript" type="text/javascript" src="js/jquery.min.js"></script>
</head>
<body>
<div class="barra-superior">
    <div class="bloque-derecho">
      <a href="muro2.php"><img src="img/ico_plu.png" height="100%" alt=""></a>
    </div>
    <div class="volver">
    </div>
    <div class="bloque-izquierdo">
    <a href="opciones.php"><img src="img/opc.png" height="80%"></a>
    <a href="logout.php"><img src="img/logout.png" height="80%" ></a>
    </div>
  </div>

  <div class="contener">

    <div class="izquierda">
      <img src="img/logopluma.png" width="30%" style="margin-left: 35%;">
      <div class="" style="color: #880015; font-weight:100; font-size:40px; width:100%; text-align:center;">Mensajes Privados</div>
      <div class="separacion1">
        <hr>
      </div>
<div class="lista-conversaciones">
      <?php
          $sql_conversaciones = "SELECT * FROM conversaciones WHERE usuario1 = '$usuario'";
          $eje_conversaciones = pg_query($dbcon, $sql_conversaciones);
          while($rw_conversaciones = pg_fetch_array($eje_conversaciones)){
            $ver = $rw_conversaciones['usuario2'];
            $id_conver = $rw_conversaciones['id_conversacion'];
      ?>
        <div class="conver">
          <a href="privados.php?id=<?php echo $id_conver; ?>"> <?php echo $ver; ?> </a>

           <div class="circulo"></div>
      </div>
      <hr>
      <?php } ?>
          </div>
    </div>

        <?php
        if($mensajes == 'si'){
          ?>
          <script type="text/javascript">
  var refresh = setInterval(
  (function () {
      $("#mensajes").load("mensajes.php?id=<?php echo $id; ?>"); 
      document.getElementById('final').scrollIntoView(true);
  }), 1000);
</script>
    <div class="derecha">
      <div class="superio">
      <div class="supeio-sexo"><img src="img/sexos/<?php echo $img_sex; ?>" style="width: 40px"></div>
      <div class="superio-usuario"><?php echo $conversacon;?></div>
      </div>
      <div class="centro-mensajes" id="mensajes">

      <?php
      $sql_mes = "SELECT * FROM mensajes WHERE id_conversacion = '$id'";
      $eje_mes = pg_query($dbcon, $sql_mes);
      while($rw_mensajes = pg_fetch_array($eje_mes)){
        $de = $rw_mensajes['de'];
        if($de == $usuario){
      ?>
    <div class="mensaje-gris"><?php echo $rw_mensajes['mensaje']; ?></div>
    <?php }
    else{
      ?>
      <div class="mensaje-rosa"><?php echo $rw_mensajes['mensaje']; ?></div>
    <?php 
    }
    }?>
    <span id="final"></span>
      </div>


<div id='env_mensaje' style="margin-top: 25px">
<form name="mensajes" action="pross_mensaje.php" method="POST">
<input type="text" class="text-mensajes" name="mensaje" autofocus> 
<input type="text" name="de" value="<?php echo $usuario; ?>" hidden> 
<input type="text" name="conversacion" value="<?php echo $id; ?>" hidden> 
<input type="text" name="para" value="<?php echo $conversacon; ?>" hidden>
<input type="submit" value="Enviar" class="btn-mensajes btn-mensajes-ver">
</form>
</div>
      

    </div>
        <?php } ?>

  </div>
</body>
</html>
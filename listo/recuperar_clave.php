<?php
include("includes/db.php");
session_start();

//Si hay una sesion iniada, devuelve al usuario al muro
if(!isset($_SESSION["usuario"])){}
    else{
        header("Location: muro2.php");
}

$sms = $_GET['sms'];

?>


<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Crear un nuevo usuario</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/midiario.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Quicksand" />
    </head>
    <body>
    <nav class="navbar navbar-fixed-top navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav orientar">
                <p style="padding-top:4%; color:white; font-size:19px;">Ya estas registrado? <a href="index.php" style="color:white; text-decoration: underline; font-weight: 900; font-size: 19px; color: white;">Inicia Sesi&oacute;n</a></p>
          </ul>
        </div>
      </div>
      </nav>
    <div class="row">
    <div class="inicio_mitad">
        <div class="init_texto">RECUPERAR ACCESO</div><BR>
        <form action="codigo_recuperacion.php" method="post">
     <input type="text" name="email" class="btn-comentar" placeholder="Ingrese su correo"><br>
     <?php include("includes/fecha.php"); ?>
      <img src="img/textocon-pluma.png" style="margin-left: 8%;"><br>
     <input type="submit" class="btn-inicio btn-inicio-ver" value="Recuperar"><br>
</form>
    </div>
    <div class="inicio_mitad">
        <img src="img/logo.png">
    </div>
    </div>
<?php
if($sms == 'c'){
    echo "<div class='recuperacion-error'>Correo no existe en nuestra base de datos</div>";
}
elseif($sms == 'f'){
    echo "<div class='recuperacion-error'>Su Fecha de nacimiento no coincide</div>";
}
elseif($sms == 'u'){
    echo "<div class='recuperacion-error'>Su Usuario No coincide</div>";
}
elseif($sms == 'e'){
    echo "<div class='recuperacion-error'>Error en el registroe</div>";
}
elseif($sms == 'p'){
    echo "<div class='recuperacion-exitosa'>Recuperacion exitosa: <br>Hemos enviado un correo con el link de recuperacion</div>";
}
else{
}
?>
</div>

    </body>
</html>
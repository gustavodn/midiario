<?php
include("includes/db.php");
session_start();

//Si hay una sesion iniada, devuelve al usuario al muro
if(!isset($_SESSION["usuario"])){}
    else{
        header("Location: muro2.php");
}

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
          <a class="navbar-brand" href="index.php"><img src="img/ico_plu.png" width="60" alt="Mi Diario en la Red"></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav orientar">
                <p style="padding-top:4%; color:white; font-size:19px;">Ya estas registrado? <a href="index.php" style="color:white; text-decoration: underline; font-weight: 900; font-size: 19px; color: white;">Inicia Sesi&oacute;n</a></p>
          </ul>
        </div>
      </div>
      </nav>
    <div class="row">
    <div class="inicio_mitad2">
    <form action="registro.php" method="POST">
        <img src="img/logo.png" width="50%" style="padding-left: 8%; margin-bottom: 10px; margin-bottom: 7%;">
        <input type="text" name="nombre" class="btn-comentar" placeholder="Apellidos y nombres" required=""><br>
        <label class="text-debajo">* Tu nombre, nunca se mostrara</label><br>

        <input type="text" name="user" class="btn-comentar" placeholder="Ingrese su apodo" required=""><br>
        <label class="text-debajo">* Tu apodo, se usara en futuras publicaciones</label><br>

        <input type="email" name="email" class="btn-comentar" placeholder="Ingrese su correo" required=""><br>
        <label class="text-debajo">* Tu correo, nunca se mostrara</label><br>

        <input type="password" name="password" class="btn-comentar" placeholder="Ingrese su contrase&ntilde;a" required=""><br>

        <?php include("select_fecha.php");?>

        </form>


    </div>
    <div class="inicio_mitad">
        <img src="img/ladoderecho.png" width="70%">
    </div>
    </div>
    </body>
</html>
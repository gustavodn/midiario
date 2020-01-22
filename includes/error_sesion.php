<?php
include("includes/db.php");
session_start();

if(!isset($_SESSION["usuario"])){}
    else{
        header("Location: muro2.php");
    }
?>

<!DOCTYPE html>
<html lang="es">
<meta http-equiv="Refresh" content="5;url=../index.php">
    <head>
        <title>Error al iniciar Sesion</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/midiario.css" rel="stylesheet">
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
          <a class="navbar-brand" href="../muro.php"><img src="../img/ico_plu.png" width="60" alt="Mi Diario en la Red"></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav orientar">
                <p style="padding-top:4%; color:white; font-size:19px;">No tienes una cuenta? <a href="../new_user.php" style="color:white; text-decoration: underline; font-weight: 900; font-size: 19px; color: white;">&Uacute;nete</a></p>
          </ul>
        </div>
      </div>
      </nav>
    <div class="row">
    <img src="../img/usuario_mal.png">
    </div>
    </body>
</html>
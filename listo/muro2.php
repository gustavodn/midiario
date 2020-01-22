<?php
    include("includes/db.php");
    include("auth.php");

    $usuario = $_SESSION['usuario'];
    $xxx = $_SESSION['usuario'];

    if (empty($_GET['etiqueta'])) {
		   $etiqueta = '';  
		} else {
		    $etiqueta = $_GET['etiqueta'];
		}

    $sql = "SELECT * FROM sobremi WHERE usuario = '$xxx'";
    $eje = pg_query($dbcon, $sql);
    $sobre = pg_fetch_array($eje);
    $sobremi = $sobre['sobremi'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/midiario.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Quicksand" />
    <title>Muro de @<?php echo $usuario; ?></title>
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
          <a class="navbar-brand" href="muro.php"><img src="img/ico_plu.png" width="70" alt="Mi Diario en la Red"></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav orientar">
            <li><a href="opciones.php"><img src="img/opc.png" width="30"></a></li>
            <li><a href="logout.php"><img src="img/logout.png" width="30" ></a></a></li>
          </ul>
        </div>
      </div>
      </nav>
    <div class="container-fluid">
        <div class="izquierda">
        <?php include("menu_izq.php"); ?>
        </div>

        <div class="centro">
        <?php include("centro.php"); ?>
        </div>

        <div class="derecha">
        <img src="img/etiqueta/inicio.png" width="70%">
          
          <?php
              $sql = "SELECT id,etiqueta FROM etiqueta";
              $eje = pg_query($dbcon, $sql);

                  while($rw_etiqueta = pg_fetch_array($eje)){
          ?>

        <a href="muro2.php?etiqueta=<?php echo $rw_etiqueta['id'];?>" class="etiq etiq-etiqueta"><?php echo $rw_etiqueta['etiqueta']; ?></a>
        
        <?php
            }
        ?>
        </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
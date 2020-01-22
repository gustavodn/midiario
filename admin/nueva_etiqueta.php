<?php
include("../includes/db.php");
session_start();
if (isset($_POST['etiqueta'])){
    $etiqueta = $_POST['etiqueta'];
        $sqlveri = "SELECT * FROM etiqueta WHERE etiqueta = '$etiqueta'";
        $ejeveri = pg_query($sqlveri);
        $countveri = pg_num_rows($ejeveri);
        if($countveri > '0'){
            header("Location:");
        }
        else{
            $id = generarCodigo(20);
            $quien = $_SESSION['usuario_admin'];
            $cuando = date("d-m-Y H:i:s");
            $sqlinsert = "INSERT INTO etiqueta (id,etiqueta,quien,cuando) VALUES ('$id','$etiqueta','$quien','$cuando')";
            $ejeinsert = pg_query($dbcon, $sqlinsert) ;
            
                if(!$ejeinsert){
                    echo "<p style='color: red'>Etiqueta No Registrada</p>";
                    header("Refresh: 5; URL='nueva_etiqueta.php'");
                }
                else{
                    echo "<p style='color: green'>Etiqueta Registrada</p>";
                    header("Refresh: 5; URL='lista_etiquietas.php'");
                }
            
        }
}
else{
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Panel de Administracion</title>
	<link rel="stylesheet" href="admin.css">
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Quicksand" />
</head>
<body>
	<div class="menu-admin">
		<img src="img/logopaneladministrativo.png" width="90%" style=" margin-left: 5%; margin-top: 10px;" />
		<div class="linea" style=" margin-left: 10%;"><img src="img/linea.png" alt="" width="90%"></div>
		<div class="text-menu"><a href="lista_usuarios.php">USUARIOS</a></div>
		<div class="linea" style="margin-left: 10%;"><img src="img/linea.png" alt="" width="90%"></div>
		<div class="text-menu"><a href="lista_etiquietas.php">ETIQUETAS</a></div>
		<div class="linea" style=" margin-left: 10%;"><img src="img/linea.png" alt="" width="90%"></div>
		<div class="text-menu"><a href="lista_estados.php">ESTADOS DE ANIMO</a></div>
		<div class="linea" style=" margin-left: 10%;"><img src="img/linea.png" alt="" width="90%"></div>

		<div class="logout">
				<div class="linea" style="margin-left: 5%;"><img src="img/linea.png" alt="" width="85%"></div>
				<a href="logout.php" class="text-menu"><div class="text-menu">CERRAR SESION</div></a>
				<div class="linea" style=" margin-left: 5%;"><img src="img/linea.png" alt="" width="85%"></div>
		</div>
	</div>


	<div class="desglose">
		<div class="titulo">Nuevo Etiqueta <a href="lista_etiquietas.php">Lista de Etiquetas</a></div>
		<form action="nueva_etiqueta.php" method="post" accept-charset="utf-8">
		<input type="text" class="input-nuevo" name="etiqueta" placeholder="Ingrese etiqueta"> <br>
		<input type="submit" class="input-submit input-submit-color" name="" value="Registrar"> 
		</form>
		
	</div>
</body>
</html>

<?php
}
?>
<?php
include("../includes/db.php");
session_start();
if (isset($_POST['estado'])){
    $estado = $_POST['estado'];
        $sqlveri = "SELECT * FROM estadoanimo WHERE estado = '$estado'";
        $ejeveri = pg_query($sqlveri);
        $countveri = pg_num_rows($ejeveri);
        if($countveri > '0'){
            header("Location: lista_estados.php");
        }
        else{
            $id = generarCodigo(20);
            $quien = $_SESSION['usuario_admin'];
            $cuando = date("d-m-Y H:i:s");
            $sqlinsert = "INSERT INTO estadoanimo (id,estado,quien,cuando) VALUES ('$id','$estado','$quien','$cuando')";
            $ejeinsert = pg_query($dbcon, $sqlinsert);
            
                if(!$ejeinsert){
                    echo "<p style='color: red'>Estado No Registrado</p>";
                    header("Refresh: 5; URL='nuevo_estado.php'");
                }
                else{
                    echo "<p style='color: green'>Estado Registrado</p>";
                    header("Refresh: 5; URL='lista_estados.php'");
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
		<div class="titulo">Nuevo Estado de Animo <a href="lista_estados.php">Lista de Estados</a></div>
		<form action="nuevo_estado.php" method="post" accept-charset="utf-8">
		<input type="text" class="input-nuevo" name="estado" placeholder="Ingrese estado"> <br>
		<input type="submit" class="input-submit input-submit-color" name="" value="Registrar"> 
		</form>
		
	</div>
</body>
</html>
<?php
}
?>
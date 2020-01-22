<?php
include("includes/db.php");
session_start();

if(!isset($_SESSION["usuario"])){}
    else{
        header("Location: muro2.php");
    }

if (isset($_POST['usuario'])){
		
    $username = $_POST['usuario'];
    $password = $_POST['clave'];
    $pass = sha1($password);
    
//Checking is user existing in the database or not
    $query = "SELECT * FROM md_user WHERE usuario='$username' AND pass='".sha1($password)."'";
    $result = pg_query($dbcon,$query);
    $rows = pg_num_rows($result);   
    $saber = pg_fetch_array($result);
        $estado = $saber['desactivar'];

            if($estado == 'si'){
                $fecha_actual = strtotime(date("d-m-Y"));
                $fecha_entrada = strtotime($saber['hasta']);
                    
                    if($fecha_actual >= $fecha_entrada)
                    {
                        $sql = "UPDATE md_user SET desactivar = '', hasta = '' WHERE usuario = '$username'";
                        $eje = pg_query($dbcon, $sql);
                        if(!$eje){
                                echo"Error de registro";
                        }
                        else{
                            session_start();
                            $_SESSION['usuario'] = $saber['usuario'];
                            $_SESSION['name'] = $saber["nombre"];
                            $_SESSION['signo'] = $saber["signo"];
                            $_SESSION['sexo'] = $saber["sexo"];
                            $_SESSION['pais'] = $saber["pais"];
                            $_SESSION['alternativo'] = $saber['email_alt'];
                            
                            header("Location: muro2.php"); // Redirect user to index.php	
                        }
                    }
                    else
                        {
                        
                        }

                    header("Location: includes/cuentasuspendida.php");
            }
            else{
                if($rows==1){
                    session_start();
                    $_SESSION['usuario'] = $saber['usuario'];
                    $_SESSION['name'] = $saber["nombre"];
                    $_SESSION['signo'] = $saber["signo"];
                    $_SESSION['sexo'] = $saber["sexo"];
                    $_SESSION['pais'] = $saber["pais"];
                    $_SESSION['alternativo'] = $saber['email_alt'];
                    
                    header("Location: muro2.php"); // Redirect user to index.php	
                    
                    }
                
                
                else{
                        header("Location: includes/error_sesion.php");
                        }
            }

    
}
//si no se han insertado datos
else{
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Inicio de Sesion</title>
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
                <p style="padding-top:4%; color:white; font-size:19px;">No tienes una cuenta? <a href="new_user.php" style="color:white; text-decoration: underline; font-weight: 900; font-size: 19px; color: white;">&Uacute;nete</a></p>
          </ul>
        </div>
      </div>
      </nav>
    <div class="row">
    <div class="inicio_mitad">
        <img src="img/logoizquierdo.png">
    </div>
    <div class="inicio_mitad">
        <div class="init_texto">INICIAR SESI&Oacute;N</div><BR>
        <form action="index.php" method="post">
     <input type="text" name="usuario" class="btn-comentar" placeholder="Ingrese su apodo / correo">
     <input type="password" name="clave" class="btn-comentar" placeholder="Ingrese su contrase&ntilde;a"><br>
     <input type="submit" class="btn-inicio btn-inicio-ver" value="Entrar"><br>
</form>

     <a href="recuperar_clave.php" class="init_texto2">Olv&iacute;de mi contrase&ntilde;a</a><br>
     <a href="new_user.php" class="init_texto2">Crear una cuenta nueva</a><br>
    </div>
    </div>
    </body>
</html>
<?php
}
?>
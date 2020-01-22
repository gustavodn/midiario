<?php
include("includes/db.php");
include("auth.php");

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Configuraciones</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Quicksand" />
        <link href="css/opciones.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.0.min.js"></script> 
        <script type="text/javascript" src="js/clave.js"></script>
        <script type="text/javascript">
        $(document).ready(function() {

           $("#imagenId").click(function(event){
            event.preventDefault();
            $(this).attr("class", "btn-conf btn-conf-ver2");

        });

           $("#imagenId2").click(function(event){
            event.preventDefault();
            $(this).attr("class", "btn-conf btn-conf-ver2");

        });

            $("#imagenId3").click(function(event){
            event.preventDefault();
            $(this).attr("class", "btn-conf btn-conf-ver2");

        });

             $("#imagenId4").click(function(event){
            event.preventDefault();
            $(this).attr("class", "btn-conf btn-conf-ver2");

        });

              $("#imagenId5").click(function(event){
            event.preventDefault();
            $(this).attr("class", "btn-conf btn-conf-ver2");

        });
        });
        </script>
    </head>
    <body>
    <div class="barra-superior">
    <div class="bloque-derecho">
      <img src="img/ico_plu.png" height="100%" alt="">
    </div>
    <div class="volver" style="float: left;"><a href="muro2.php" class="volver">Volver</a></div>
    <div class="bloque-izquierdo">
      <div class="volver"><a href="logout.php" class="volver">Cerrar Sesion</a></div>
    </div>
  </div>

    <div class="desglose">

      <div class="izquierda">
          <img src="img/logo.png" style="padding-top: 15%; padding-left: 10%;">
      </div>
      <div class="derecha" style="padding-top: 3%; padding-left: 5%">
        OPCIONES<br>
        <a id="imagenId" class="btn-conf btn-conf-ver" class="accordion-toggle" data-toggle="collapse" href="#collapseOne">Contrase&ntilde;a <div id="signo" style="padding-left: 10px; float: right; color: #880015;">+</div></a>
            <div id="collapseOne" class="collapse">
                Cambiar Contrase&ntilde;a
               <div class="accordion-inner">
                <form name="nuevo_empleado" action="" onsubmit="enviarDatosEmpleado(); return false">
                <input name="actual" type="text" class="text-opciones" placeholder="Clave Actual" /><br>
                <input type="text" name="clave1" class="text-opciones" placeholder="Nueva Clave"><br>
                <input type="text" name="clave2" class="text-opciones" placeholder="Repita nueva Clave"><br>
                <input type="submit" name="Submit" class="btn-opciones btn-opciones-ver" value="Guardar" />
                </form>
               </div>
               <div id="resultado"></div>
              Verificador de Contrase&ntilde;a<br>
              <input name="actual" type="text" class="text-opciones" placeholder="Seguridad de su clave" /><br>
              </div> 
              
        <br>
        
        <a id="imagenId2" class="btn-conf btn-conf-ver" class="accordion-toggle" data-toggle="collapse" href="#collapseTwo">Correo <div id="signo" style="padding-left: 10px; float: right; color: #880015;">+</div></a>
        <div id="collapseTwo" class="collapse">
               <div class="accordion-inner">
                <div class="titulo-opciones">Cambiar Correo</div>
                <form name="nuevo_correo" action="" onsubmit="enviarDatosCorreo(); return false">
                <input name="correo" type="text" placeholder="Nuevo Correo" class="text-opciones"/><br>
                <input type="text" class="text-opciones" placeholder="Repita Correo" name="verificacion"><br>
                <input type="submit" name="Submit" class="btn-opciones btn-opciones-ver" value="Guardar" />
                </form>
                <br>
                <div class="titulo-opciones">Colocar Correo Altenativo</div>
                <form name="correo_alternativo" action="" onsubmit="enviarCorreoAlternativo(); return false">
                  <input name="correo" type="text" class="text-opciones" placeholder="Correo Alternativo" /><br>
                  <label style="font-size: 10px;">Correo Actual:  <br> 
                  <?php

                  if($_SESSION['alternativo'] == ''){
                    $alt = "No ha registrado correo alternativo";
                  }
                  else{
                    $alt = $_SESSION['alternativo'];
                  }
                   ?>
                    <?php echo $alt; ?> 
                   </label><br>
                  <input type="submit" name="Submit" class="btn-opciones btn-opciones-ver" value="Guardar" />
                </form>
               </div>
                   <div id="resultado1"></div>
                    <div id="resultado2"></div>
              </div> 
        <br>

        <a id="imagenId3" class="btn-conf btn-conf-ver" class="accordion-toggle" data-toggle="collapse" href="#collapseTree">Validacion de Acceso <div id="signo" style="padding-left: 10px; float: right; color: #880015;">+</div></a>
        <div id="collapseTree" class="collapse">
               <div class="accordion-inner">
                <form name="validacion_acceso" action="" onsubmit="enviarValidacionAcceso(); return false" class="formulario">
                Desea cerrar sesion automaticamente,<br> despues de 10 min de inactividad?<br>
                <div class="radio">
                    <input type="radio" name="opciones" id="opciones_1" value="s">
                <label for="opciones_1">Si</label><br>
                 <input type="radio" name="opciones" id="opciones_2" value="n">
                <label for="opciones_2">No</label>
                </div>
                <input type="submit" name="Submit" class="btn-opciones btn-opciones-ver" value="Guardar" />
                </form>
               </div>
               <div id="resultado3"></div>
              </div> 
<br>

                <a id="imagenId4" class="btn-conf btn-conf-ver" class="accordion-toggle" data-toggle="collapse" href="#collapseFour">Cuenta <div id="signo" style="padding-left: 10px; float: right; color: #880015;">+</div></a>
          <div id="collapseFour" class="collapse">
               <div class="accordion-inner">
                <form name="cuenta" action="" onsubmit="enviarCuenta(); return false" class="formulario">
                <label>Suspender Cuenta</label><br>
                <div class="radio">
                <input type="radio" id="1" name="desactivar" value="si" onchange="habilitar(false);">
                <label for="1">Hasta nuevo incio de Sesion</label> <br>
                <input type="radio" name="desactivar" value="si" id="check" onchange="habilitar(this.checked);">
                <label for="check">Por un tiempo especifico</label><br>
                <input type="date" id="entrada" name="tiempo" disabled="" class="fecha-opciones"><br>
                <input type="submit" name="Submit" class="btn-opciones btn-opciones-ver" value="Guardar" />
                </div>
                
            </form>
            <a href="" class="link">Eliminar cuenta definitivamente</a>
               </div>
              </div> 
              <div id="resultado4"></div>

<a id="imagenId5" class="btn-conf btn-conf-ver" class="accordion-toggle" data-toggle="collapse" href="#collapseFive">Mas Informacion <div id="signo" style="padding-left: 10px; float: right; color: #880015;">+</div></a>

        <div id="collapseFive" class="collapse">
               <div class="accordion-inner">
                <div class="terminos">Terminos y Condiciones</div>
               </div>
              </div> 
<br>


      </div>

    </div>

    
    <script src="js/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>

    <script>
        function habilitar(value) {
            if (value == true) {
                // habilitamos
                document.getElementById("entrada").disabled = false;
            } else if (value == false) {
                // deshabilitamos
                document.getElementById("entrada").disabled = true;
            }
        }
    </script>
    </body>
</html>


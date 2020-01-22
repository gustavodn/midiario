<?php
  include('includes/db.php');
  include('auth.php');

  $usuario2 = $_SESSION['usuario'];

  $sql = "SELECT * FROM sobremi WHERE usuario = '$usuario2'";
  $eje = pg_query($dbcon, $sql);

  $sobremi = pg_fetch_array($eje);
  $sobremi = $sobremi['sobremi'];
?>
<!DOCTYPE html>
<html>
  <script>
  function objetoAjax() {
    var xmlhttp = false;
    try {
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {

        try {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (E) {
            xmlhttp = false;
        }
    }

    if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
        xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
}
  </script>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Muro de @<?php echo $_SESSION['usuario']; ?> </title>
  <link rel="stylesheet" href="css/all.css">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Quicksand" />
  <script language="JavaScript" type="text/javascript" src="js/jquery.min.js"></script>
  <script language="JavaScript" type="text/javascript" src="js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Rouge+Script&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/public.css">
</head>
<body>
  <div class="barra-superior">
    <div class="bloque-derecho">
      <img src="img/ico_plu.png" height="100%" alt="">
    </div>
    <div class="volver">
    </div>
    <div class="bloque-izquierdo">
    <a href="opciones.php"><img src="img/opc.png" height="80%">
    <a href="logout.php"><img src="img/logout.png" height="80%" >
    </div>
  </div>
    <div class="contener">
    <div class="izquierda">
      <?php include('menu_izq.php'); ?>
    </div>

    <div class="centro">
    
    <?php
      $sql = "SELECT * FROM entrada WHERE compartir = 's' ORDER BY fecha DESC";
      $eje = pg_query($dbcon, $sql);
      
      while ($rw_entradapro = pg_fetch_array($eje)) {

        $desarrollo = $rw_entradapro['desarrollo'];
        $id = $rw_entradapro['id'];
        $id_etiqueta = $rw_entradapro['etiqueta'];
        $usuario = $rw_entradapro['usuario'];
        $reportes = $rw_entradapro['reportes'];
        $saber_comentar = $rw_entradapro['comentario'];

         
        $sql55 = "SELECT * FROM md_user WHERE usuario = '$usuario'";
        $eje55 = pg_query($dbcon, $sql55);
        $signo = pg_fetch_array($eje55);
        $signo2 = $signo['signo'];
        $sexo = $signo['sexo'];
        $bandera = $signo['pais'];
    ?>
    <div class="publicacion">

      <div class="superior">
        <div class="sexoser">
          <?php
            if($sexo == 'h'){
              echo "<img src='img/sexos/masculino2.png' width='80%' style='margin-left:15%;'>";
            }
            if($sexo == 'm'){
              echo "<img src='img/sexos/femenino2.png' width='60%' style='margin-left:20%;'>";
            }
            if($sexo == 'hi'){
              echo "<img src='img/sexos/masculinointerrogativo2.png' width='80%' style='margin-left:15%;'>";
            }
            if($sexo == 'mi'){
              echo "<img src='img/sexos/femeninointerrogativo2.png' width='60%' style='margin-left:20%;'>";
            }
          ?>
        
        </div>

        <div class="usuario">
          <?php
          if($usuario == $usuario2){
            ?>
            <div class="user"><?php echo $usuario;?></div>
            <?php
          }
          else{
          ?>
          <div class="user"><a href="murouser.php?usuario=<?php echo $usuario; ?>"><?php echo $usuario;?></a></div>
          <?php
          }
          ?>
          
          <?php
            $sql22 = "SELECT * FROM etiqueta WHERE id = '$id_etiqueta'";
            $eje22 = pg_query($dbcon, $sql22);
            $etiqueta = pg_fetch_array($eje22);

              $etiqueta = $etiqueta['etiqueta'];
          ?>
          <div class="etiqueta">#<?php echo $etiqueta;?></div>
        </div>

        <div class="signo">
        <?php
              echo $signo2;
          ?>
          <div class="etiqueta"></div>
        </div>

        <?php
          if($usuario == '$usuario2'){
        ?>
        <div class="favorito">
        <?php
              $id_entrada = $rw_entradaspro['id'];
              $sql23 = "SELECT * FROM favorito WHERE id_entrada = '$id' AND favorito = 'x' AND usuario = '$usuario2'";
              $eje23 = pg_query($dbcon, $sql23);
              $count23 = pg_num_rows($eje23);
              $ver23 = pg_fetch_array($eje23);
              $id_fav = $ver23['id'];
              if($count23 > '0'){
              ?>
          <a href="quitar_favorito.php?id=<?php echo $id_fav; ?>"><img src="img/fav_act.png" width="100%"></a>
          <?php } 
              else{
                ?>
                <a href="agg_favorito.php?id=<?php echo $id; ?>"><img src="img/fav.png" width="100%"></a>
                <?php
              }
              ?>
          <div class="etiqueta"></div>
        </div>
              <?php
          }
          ?>

      </div>
      <div class="centropubli">
        <div class="pais">
          <?php
          $sql33 = "SELECT * FROM relacion_pais WHERE pais = '$bandera'";
          $eje33 = pg_query($dbcon, $sql33);
          $ver33 = pg_fetch_array($eje33);
          $bandera_pais = $ver33['imagen'];
          ?>
          <img src="img/banderas/<?php echo $bandera_pais; ?>" width="70%" style="margin-left: 15%;">
        </div>
        <div class="desarrollo">
          <?php 
        echo substr($desarrollo, 0, 300); 
        if(strlen($desarrollo) > '300'){
        ?> 
        <a href="" class="openBtn2">... Ver Mas</a>
      <?php } ?>
        </div>
        
      </div>
      <div class="footer">
      <?php
            $sql56 = "SELECT * FROM megusta WHERE id_entrada = '$id' AND usuario = '$usuario2' AND mg = 'x'";
            $eje56 = pg_query($dbcon, $sql56);
            $megusta = pg_num_rows($eje56);

            $sql56 = "SELECT * FROM nomegusta WHERE id_entrada = '$id' AND usuario = '$usuario2' AND nmg = 'x'";
            $eje56 = pg_query($dbcon, $sql56);
            $nomegusta = pg_num_rows($eje56);
            $nomegustas = $rw_entradapro['nomegusta'];
             $megustas = $rw_entradapro['megusta'];

             $sql222 = "SELECT * FROM comentarios WHERE id_entrada = '$id' ORDER BY fecha DESC";
              $eje222 = pg_query($dbcon, $sql222);
              $comentarios = pg_num_rows($eje222);
          ?>
          <?php
          if($megusta > '0'){
            ?>
           <div id='mg' style="width: 5%; float:left; margin-right: 5px; color: #880015; font-weight:900;"><a href="quitarmegusta.php?id=<?php echo $id;?>"><img src="img/iconos/mg_act.png" width="60%"></a> <?php echo $megustas; ?></div>
            <?php
          }
          else{
        ?>
        <div id='mg' style="width: 5%; float:left; margin-right: 5px; color: #880015; font-weight:900;"><a href="megusta.php?id=<?php echo $id;?>"><img src="img/iconos/mg.png" width="60%"></a> <?php echo $megustas; ?></div>
        <?php
          }

          if($nomegusta > '0'){
        ?>
        <div id='nmg' style="width: 5%; float:left; margin-right: 5px; color: #880015; font-weight:900;"><a href="quitarnomegusta.php?id=<?php echo $id;?>"><img src="img/iconos/nmg_act.png" width="60%"></a> <?php echo $nomegustas; ?></div>
        <?php
          }
          else{
          ?>
          <div id='nmg' style="width: 5%; float:left; margin-right: 5px; color: #880015; font-weight:900;"><a href="nomegusta.php?id=<?php echo $id;?>"><img src="img/iconos/nmg.png" width="60%"></a> <?php echo $nomegustas; ?></div>
          <?php
          }
          ?>
        <?php
        if($saber_comentar == 's'){
          ?>
        <div id='comentario' style="width: 5%; float: left; margin-right: 5px; color: #880015; font-weight:900;"><a data-toggle="collapse" href="#collapse<?php echo $rw_entradapro['id'];?>"><img src="img/iconos/cmn.png" width="60%"></a> <?php echo $comentarios; ?></div>
        <?php
        }
        ?>
        <?php
                  $sql56 = "SELECT * FROM reporte_publicacion WHERE id_entrada = '$id' AND usuario = '$usuario2' AND rp = 'x'";
                  $eje56 = pg_query($dbcon, $sql56);
                  $reportado = pg_num_rows($eje56);

                  $reportado2 = $rw_entradas['reportes'];

                    if($reportado > '0'){
                     ?>
                    <div id='reportar' style="width: 5%; float: left; margin-right: 5px; color: #880015; font-weight:900;"><a href="quitarreportepublicacion.php?id=<?php echo $id; ?>"><img src="img/iconos/rpt_act.png" width="65%"></a> <?php echo $reportes; ?></div>
                     <?php
                    }
                    else{
                      ?>
                    <div id='reportar' style="width: 5%; float: left; margin-right: 5px; color: #880015; font-weight:900;"><a href="reporte_publicacion.php?id=<?php echo $id; ?>"><img src="img/iconos/rpt.png" width="65%"></a> <?php echo $reportes; ?></div>
                      <?php
                    }
                    
                ?> 
          </div>
      </div>
      <div id="collapse<?php echo $rw_entradapro['id'];?>" class="collapse comentarios">
      <div class="comentarios" id="comentarios<?php echo $rw_entradapro['id'];?>" style="color: black;">
         <?php
         
         while($rw_comentarios = pg_fetch_array($eje222)){
           $id_comentario = $rw_comentarios['id'];
           $usuario52 = $rw_comentarios['usuario'];
           $mg_comentarios = $rw_comentarios['mg'];
           $nmg_comentarios = $rw_comentarios['nmg'];
           $report_comentarios = $rw_comentarios['report'];
           $xxx = "SELECT pais FROM md_user WHERE usuario = '$usuario52'";
           $ejexx = pg_query($dbcon, $xxx);
           $verxx = pg_fetch_array($ejexx);
           $bandera22 = $verxx['pais'];

          $sql44 = "SELECT * FROM relacion_pais WHERE pais = '$bandera22'";
          $eje44 = pg_query($dbcon, $sql44);
          $ver44 = pg_fetch_array($eje44);
          $bandera_pais22 = $ver44['imagen'];
           ?>
          <div class="comentario" style="margin-left: -40%;">
            <div class="usuario-coment"><img src="img/banderas/<?php echo $bandera_pais22; ?>" width="30px"> <a href="murouser.php?usuario=<?php echo $rw_comentarios['usuario']; ?>" ><?php echo $rw_comentarios['usuario']; ?></a></div>
            <div class="coment" style="margin-top: 10px"><?php echo $rw_comentarios['comentario']; ?></div>
          </div>
          <div style="width: 100%; margin-left: 470px;">
          <?php
            $sql59 = "SELECT * FROM megusta_comentario WHERE id_comentario = '$id_comentario' AND usuario = '$usuario2' AND mg = 'x'";
            $eje59 = pg_query($dbcon, $sql59);
            $megusta_comentario = pg_num_rows($eje59);

            $sql60 = "SELECT * FROM nomegusta_comentario WHERE id_comentario = '$id_comentario' AND usuario = '$usuario2' AND nmg = 'x'";
            $eje60 = pg_query($dbcon, $sql60);
            $nomegusta_comentario = pg_num_rows($eje60);

            $sql61 = "SELECT * FROM reporte_publicacion WHERE id_comentario = '$id_comentario' AND usuario = '$usuario2' AND rp = 'x'";
            $eje61 = pg_query($dbcon, $sql61);
            $reporte_comentario = pg_num_rows($eje61);

            if($megusta_comentario > '0'){
          ?>
          <div id='mg' style="width: 8%; float:left; margin-right: 5px; color: #880015; font-weight:900;"><a href="quitarmg_comentario.php?id=<?php echo $id_comentario; ?>"><img style="float: left" src="img/iconos/mg_act.png" width="70%"></a> <?php echo $mg_comentarios; ?></div>
          <?php
            }
            else{
            ?>
            <div id='mg' style="width: 8%; float:left; margin-right: 5px; color: #880015; font-weight:900;"><a href="mg_comentarios.php?id=<?php echo $id_comentario; ?>"><img style="float: left" src="img/iconos/mg.png" width="70%"></a> <?php echo $mg_comentarios; ?></div>
            <?php
            }
            if($nomegusta_comentario > '0'){
              ?>
              <div id='nmg' style="width: 8%; float:left; margin-right: 5px; color: #880015; font-weight:900;"><a href="quitarnomegusta_comentario.php?id=<?php echo $id_comentario; ?>"><img style="float: left" src="img/iconos/nmg_act.png" width="70%"></a> <?php echo $nmg_comentarios; ?></div>
              <?php
              }
              else{
              ?>
              <div id='nmg' style="width: 8%; float:left; margin-right: 5px; color: #880015; font-weight:900;"><a href="nomegusta_comentario.php?id=<?php echo $id_comentario; ?>"><img style="float: left" src="img/iconos/nmg.png" width="70%"></a> <?php echo $nmg_comentarios; ?></div>
              <?php
              }
              if($report_comentarios > '0'){
                ?>
                <div id='reportar' style="width: 8%; float:left; margin-right: 5px; color: #880015; font-weight:900;"><a href="quitarreportar_comentario.php?id=<?php echo $id_comentario; ?>"><img style="float: left" src="img/iconos/rpt_act.png" width="70%"></a> <?php echo $report_comentarios; ?></div>
                <?php
                }
                else{
                ?>
                <div id='reportar' style="width: 8%; float:left; margin-right: 5px; color: #880015; font-weight:900;"><a href="reportar_comentario.php?id=<?php echo $id_comentario; ?>"><img style="float: left" src="img/iconos/rpt.png" width="70%"></a> <?php echo $report_comentarios; ?></div>
                <?php
                }
                ?>

      </div>
          <br>
          <br>
         <?php
      }
?>    
      </div>
      <div class="comentar" style="color: black">
      <form name="slam<?php echo $rw_entradapro['id'];?>" action="" onsubmit="comentar<?php echo $rw_entradapro['id'];?>(); return false">
            <input type="text" name="comentario" class="btn-comentar"> <input hidden type="text" name="id" value="<?php echo $id; ?>"> <input type="submit" class="btn-inicio btn-inicio-ver" value="comentar">
          </form>






      <script>
      function comentar<?php echo $rw_entradapro['id'];?>() {

              //div donde se mostrará lo resultados
              divResultado = document.getElementById('comentarios<?php echo $rw_entradapro['id'];?>');
              //recogemos los valores de los inputs
              comentario = document.slam<?php echo $rw_entradapro['id'];?>.comentario.value;
              id = document.slam<?php echo $rw_entradapro['id'];?>.id.value;

              //instanciamos el objetoAjax
              ajax = objetoAjax();

              //uso del medotod POST
              //archivo que realizará la operacion
              //registro.php
              ajax.open("POST", "comentario.php", true);
              //cuando el objeto XMLHttpRequest cambia de estado, la función se inicia
              ajax.onreadystatechange = function() {
                  //la función responseText tiene todos los datos pedidos al servidor
                  if (ajax.readyState == 4) {
                      //mostrar resultados en esta capa
                      divResultado.innerHTML = ajax.responseText
                          //llamar a funcion para limpiar los inputs
                          LimpiarCampos<?php echo $rw_entradapro['id'];?>();
                  }
              }
              ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
              //enviando los valores a registro.php para que inserte los datos
              ajax.send("comentario=" + comentario + "&id=" + id)
              }

              function LimpiarCampos<?php echo $rw_entradapro['id'];?>() {
                document.slam<?php echo $rw_entradapro['id'];?>.comentario.value = "";
            }
      </script>
      </div>


      </div>
      
    
    <?php
      }
      ?>


    </div>

    <div class="derecha">
    <img src="img/etiqueta/inicio.png" width="100%" style="margin-top:10px;">
    <?php
              $sql = "SELECT id,etiqueta FROM etiqueta ORDER BY etiqueta ASC";
              $eje = pg_query($dbcon, $sql);

                  while($rw_etiqueta = pg_fetch_array($eje)){
          ?>

        <a href="muro2.php?etiqueta=<?php echo $rw_etiqueta['id'];?>" class="etiq etiq-etiqueta"><?php echo $rw_etiqueta['etiqueta']; ?></a>
        
        <?php
            }
        ?>

    </div>

    </div>
    <div class="modal fade" id="bootstrap-modal" role="dialog">
        <div class="modal-dialog" role="document"> 
          <!-- Modal contenido-->
          <div class="modal-content">
            <div class="modal-body" style="font-size: 20px;">
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>
<script>
	$('.openBtn2').on('click',function(e){
		e.preventDefault();
		$('.modal-body').load('mostrar_publicacion.php?id=3',function(){
			$('#bootstrap-modal').modal({show:true});
		});
	});
	</script>
</html>

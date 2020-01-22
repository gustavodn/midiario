<?php
$rwdatos_user_sql = "SELECT * FROM md_user WHERE usuario = '$xxx'";
$rwdatos_user_eje = pg_query($dbcon, $rwdatos_user_sql);
$rwdatos = pg_fetch_array($rwdatos_user_eje);
$rw_sexo = $rwdatos['sexo'];
$rw_pais = $rwdatos['pais'];
$rw_signo = $rwdatos['signo'];


$sql = "SELECT * FROM seguido WHERE seguidopor = '$xxx'";
$eje = pg_query($dbcon, $sql) or die(pg_last_error());
$seguidos = pg_num_rows($eje);
$sql = "SELECT * FROM seguido WHERE seguido = '$xxx'";
$eje = pg_query($dbcon, $sql) or die(pg_last_error());
$seguidores = pg_num_rows($eje);
?>
<div class="list-group menu-fixed-top">
             <div class="perfil-usuario">
               <div class="sexo-user-view">
                  <?php
                    if($rw_sexo == 'h'){
                      echo "<img src='img/sexos/masculino2.png' width='50%'>";
                    }
                    if($rw_sexo == 'm'){
                      echo "<img src='img/sexos/femenino2.png' width='50%'>";
                    }
                    if($rw_sexo == 'hi'){
                      echo "<img src='img/sexos/masculinointerrogativo2.png' width='50%'>";
                    }
                    if($rw_sexo == 'mi'){
                      echo "<img src='img/sexos/femeninointerrogativo2.png' width='50%'>";
                    }
                  ?>
                  <?php
                    $sql33 = "SELECT * FROM relacion_pais WHERE pais = '$rw_pais'";
                    $eje33 = pg_query($dbcon, $sql33);
                    $ver33 = pg_fetch_array($eje33);
                    $bandera_pais = $ver33['imagen'];
                    ?>
                    <img src="img/banderas/<?php echo $bandera_pais; ?>" width="50%">
               </div>

               <div class="user-view">@armando</div>

               <div class="signo-user-view">
                 <?php
                  $sqllll = "SELECT * FROM relacion_signoimage WHERE signo = '$rw_signo'";
                  $ejeeee = pg_query($dbcon, $sqllll);
                  $veerrr = pg_fetch_array($ejeeee);
                  $signo_ver_imagen = $veerrr['imagen'];
                 ?>
               <img src="img/signosimg/<?php echo $signo_ver_imagen; ?>" width="100%"></div>
                <hr>

               <div class="seguidos-view">Seguidos<br>
               <div style="color:#000000; font-weight: 100;"><?php echo $seguidos; ?></div>
               </div>

              <div class="seguidores-view">
                Seguidores<br>
                <div style="color:#000000; font-weight: 100;"><?php echo $seguidores; ?></div>
              </div>
                    <div class="ver-barra">
                      <hr>
                    </div>

                    <div class="opciones">
                    <?php

                      $sql = "SELECT id FROM seguido WHERE seguidopor = '$usuario2' AND seguido = '$xxx'";
                      $eje = pg_query($dbcon, $sql);
                      $count = pg_num_rows($eje);

                          if($count > '0'){?>
                           <a href="dejardeseguir.php?usuario=<?php echo $xxx; ?>"><img src="img/dejar-de-seguir.png" width="10%" style="margin-left: 15%"></a>
                          <?php
                          }
                          else{
                            ?>
                          <a href="seguir.php?usuario=<?php echo $xxx; ?>"><img src="img/opciones_sup/seguir.png" width="10%" style="margin-left: 15%"></a>
                           <?php
                          }
                    ?>

        <?php

        $sql = "SELECT * FROM solicitud_confidente WHERE solicitante = '$usuario2' AND solicitado = '$xxx' AND estado = 'no'";
        $eje = pg_query($dbcon, $sql);
        $count = pg_num_rows($eje);

        $sql = "SELECT * FROM solicitud_confidente WHERE solicitado = '$usuario2' AND solicitante = '$xxx' AND estado = 'no'";
        $eje = pg_query($dbcon, $sql);
        $count2 = pg_num_rows($eje);
        $ver = pg_fetch_array($eje);
        $id_conf = $ver['id'];

        $sql = "SELECT * FROM confidente WHERE confidente1 = '$usuario2' AND confidente2 = '$xxx'";
        $eje = pg_query($dbcon, $sql);
        $count3 = pg_num_rows($eje);

          if($count > '0'){ ?>
            <img src="img/confidentes/ESPERA.png" width="10%" style="margin-left: 20%">
            <?php
          }
          elseif($count2 > '0'){
          ?>
            <a href='aceptar_confidente.php?id=<?php echo $id_conf; ?>'><img src="img/confidentes/POR-APROBAR.png" width="10%" style="margin-left: 20%"></a>
            <?php
          }
          elseif($count3 > '0'){
            ?>
            <a href='eliminar_confidente.php?usuario=<?php echo $xxx; ?>'><img src="img/confidentes/DEJAR-DE-SEGUIR.png" width="10%" style="margin-left: 20%"></a>
          <?php
          }
          else{ ?>
           <a href='solicitar_confi.php?usuario=<?php echo $xxx; ?>'><img src="img/confidentes/NUEVO.png" width="10%" style="margin-left: 20%"></a>
          <?php
          }
          ?>

          <?php
          if($count3 > '0'){ ?>
            <a href="verificacion_conversacion.php?usuario=<?php echo $xxx; ?>"><img src="img/opciones_sup/mensajes.png" width="10%" style="margin-left: 20%"></a>
          <?php
          }
          else{
          ?>
            <img src="img/mensajes-inactivo.png" width="10%" style="margin-left: 20%">
          <?php
          }
          ?>


                      
                      
                      
                    </div>
               
</div>

            <a href="ver_slam.php?usuario=<?php echo $xxx; ?>" class="menu menu-opcion" ><i class="fas fa-question" style="color: #000000; font-size:30px; position: fixed; margin-top: -3px;"></i> <div style="margin-left: 50px; color: black;">Slam</div></a>

            <?php
          if($count3 > '0'){ ?>
             <a href="verificacion_conversacion.php?usuario=<?php echo $xxx; ?>" class="menu menu-opcion" ><i class="fas fa-comments" style="color: #000000; font-size:30px; position: fixed; margin-top: -3px;"></i> <div style="margin-left: 50px; color: black;">Privados</div></a>
          <?php } ?>

             <link rel="stylesheet" href="css/bootstrap.min.css">
            <a class="accordion-toggle menu menu-opcion" data-toggle="collapse" href="#collapseOne"><i class="fas fa-user-edit" style="color: #000000; font-size:30px; position: fixed; margin-top: -3px;"></i> <div style="margin-left: 50px; color: black;">Sobre m&iacute;</div></a>
            <div id="collapseOne" class="collapse">
               <div class="accordion-inner">
               <div width= "70%" style="margin-left:10%; font-size:15x"> <?php echo $sobremi; ?></div>
               </div>
              </div>
          </div>
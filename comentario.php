<?php
include('includes/db.php');
include('auth.php');
$comentario = $_POST['comentario'];
$id_entrada = $_POST['id'];
$usuario = $_SESSION['usuario'];
$id = generarCodigo(20);
$fecha = date('d-m-Y');
if(strlen($comentario) > '0'){
    $sql = "INSERT INTO comentarios (id,id_entrada,usuario,comentario,mg,nmg,report,fecha) VALUES ('$id','$id_entrada','$usuario','$comentario','0','0','0','$fecha')";
    $eje = pg_query($dbcon, $sql) or die (pg_last_error()); 
}
else{
    $sql222 = "SELECT * FROM comentarios WHERE id_entrada = '$id_entrada' ORDER BY fecha DESC";
    $eje222 = pg_query($dbcon, $sql222);
    $comentarios = pg_num_rows($eje222);

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
            <div class="usuario-coment"><img src="img/banderas/<?php echo $bandera_pais22; ?>" width="30px" style="margin-left: 10%;"> @<?php echo $rw_comentarios['usuario']; ?></div>
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
      <?php
}

if(!$eje){
}
else{
    $sql222 = "SELECT * FROM comentarios WHERE id_entrada = '$id_entrada' ORDER BY fecha DESC";
    $eje222 = pg_query($dbcon, $sql222);
    $comentarios = pg_num_rows($eje222);

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
            <div class="usuario-coment"><img src="img/banderas/<?php echo $bandera_pais22; ?>" width="30px" style="margin-left: 10%;"> @<?php echo $rw_comentarios['usuario']; ?></div>
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
      <?php
}
?>
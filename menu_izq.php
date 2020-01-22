            <div class="list-group menu-fixed-top">
              <img src="img/logo.png" width="100%" style="margin-bottom: 30px; margin-top:15%;">
            <a href="diario.php" class="menu menu-opcion" ><i class="fas fa-book" style="color: #000000; font-size:30px; position: fixed; margin-top: -3px"></i> <div style="margin-left: 50px; color: black;">Diario</div></a>

            <a href="slam.php" class="menu menu-opcion" ><i class="fas fa-question" style="color: #000000; font-size:30px; position: fixed; margin-top: -3px;"></i> <div style="margin-left: 50px; color: black;">Slam</div></a>

             <a href="favoritos.php" class="menu menu-opcion" ><i class="fas fa-star" style="color: #000000; font-size:30px; position: fixed; margin-top: -3px;"></i> <div style="margin-left: 50px; color: black;">Favoritos</div></a>

             <a href="privados.php" class="menu menu-opcion" ><i class="fas fa-comments" style="color: #000000; font-size:30px; position: fixed; margin-top: -3px;"></i> <div style="margin-left: 50px; color: black;">Privados</div></a>

             <a href="confidentes.php" class="menu menu-opcion" ><i class="fab fa-hotjar" style="color: #000000; font-size:30px; position: fixed; margin-top: -3px;"></i> <div style="margin-left: 50px; color: black;">Confidentes</div></a>

             <a href="seguidores.php" class="menu menu-opcion" ><i class="fas fa-backward" style="color: #000000; font-size:30px; position: fixed; margin-top: -3px;"></i> <div style="margin-left: 50px; color: black;">Seguidores</div></a>

             <a href="seguidos.php" class="menu menu-opcion" ><i class="fas fa-forward" style="color: #000000; font-size:30px; position: fixed; margin-top: -3px;"></i> <div style="margin-left: 50px; color: black;">Seguidos</div></a>

             <link rel="stylesheet" href="css/bootstrap.min.css">
            <a class="accordion-toggle menu menu-opcion" data-toggle="collapse" href="#collapseOne"><i class="fas fa-user-edit" style="color: #000000; font-size:30px; position: fixed; margin-top: -3px;"></i> <div style="margin-left: 50px; color: black;">Sobre m&iacute;</div></a>
            <div id="collapseOne" class="collapse">
               <div class="accordion-inner">
                <form action="sobremi.php" method="post" accept-charset="utf-8">
                  <div style="font-family: Quicksand; margin-left: 20px; margin-top: 10px;">Dejanos tu resumen</div>
                  <textarea class="btn-comentar" style="width: 80%; margin-left: 10%; height: 100px; font-size: 15px;" name="sobremi" maxlength="300"><?php echo $sobremi; ?></textarea>
                  <input type="submit" value="Guardar" class="btn-inicio btn-inicio-ver" style="margin-top: 10px; margin-left: 50%;">
                </form>
               </div>
              </div>
          </div>
            <div class="list-group menu-fixed-top">
              <div class="prueba prueba-ver">
              <div class="row">
                <div class="sexo"><img src="img/sexos/femenino.png" width="50%"><img src="img/banderas/br.png" width="50%"></div>
                <div class="prueba-usuario"><strong>@armando</strong></div>
                <div class="signo"><img src="img/signosimg/geminis.png" width="100%"></div>
              </div>

            <div class="row">
            <div class="seguidos">Seguidos<br>0</div>
            <div class="seguidos">Seguidores <br> 0</div>
            </div>
            </div>
            <a href="diario.php"><img src="img/menu/menudiario.png" width="100%"></a><br>
            <a href="slam.php"><img src="img/menu/menuslam.png" width = "100%"><br></a>
            <a href="favoritos.php"><img src="img/menu/menusfavoritos.png" width = "100%"><br></a>
            <a href=""><img src="img/menu/menusprivado.png" width = "100%"></a>
            <a href="confidentes.php"><img src="img/menu/menusconfidentes.png" width = "100%"></a>
            <a href="seguidores.php"><img src="img/menu/menusseguidores.png" width = "100%"></a>
            <a href="seguidos.php"><img src="img/menu/menusseguidos.png" width = "100%"></a>
            <a class="accordion-toggle" data-toggle="collapse" href="#collapseOne"><img src="img/menu/menussobremi.png" width = "100%"></a>
            <div id="collapseOne" class="collapse">
               <div class="accordion-inner">
                <form action="sobremi.php" method="post" accept-charset="utf-8">
                  Describete (200 Letras):
                  <textarea name="sobremi" maxlength="200"><?php echo $sobremi; ?></textarea>
                  <input type="submit" value="Guardar" class="btn btn-success">
                </form>
               </div>
              </div>
          </div>
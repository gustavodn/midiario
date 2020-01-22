<script language="JavaScript" type="text/javascript" src="js/slam.js"></script>
<?php
$usuario = $_SESSION['usuario'];

$sql = "SELECT * FROM slam WHERE usuario = '$usuario'";
$eje = pg_query($dbcon, $sql);
$rw_slam = pg_fetch_array($eje);
?>

<div id="resultado" class="formulario">
	<form name="slam_3" action="" onsubmit="enviarSlam3(); return false">
    ¿Sobre que tema te gustaría saber más? <input class="text-slam" type="text" name="gustaria" value="<?php echo $rw_slam['gustaria']; ?>"> <br>
    ¿Cuál es tu película favorita? <input class="text-slam" type="text" name="preferida_pelicula" value="<?php echo $rw_slam['preferida_pelicula']; ?>"> <br>
    ¿Le rompiste el corazón a alguien?

    <div class="formulario">
    <div class="radio">
    <?php
        if($rw_slam['roto_corazon'] == 'si'){
            echo "<input id = 's' type='radio' name='roto_corazon' value='si' checked> <label for = 's'> Si </label>
            <input id = 'n' type='radio' name='roto_corazon' value='no'> <label for = 'n'> No </label> <br>";
        }
        elseif($rw_slam['roto_corazon'] == 'no'){
            echo "<input id = 's' type='radio' name='roto_corazon' value='si' > <label for = 's'> Si </label>
            <input id = 'n' type='radio' name='roto_corazon' value='no' checked> <label for = 'n'> No </label> <br>";
        }
        else{
           echo "<input id = 's' type='radio' name='roto_corazon' value='si'> <label for = 's'> Si </label>
            <input id = 'n' type='radio' name='roto_corazon' value='no'> <label for = 'n'> No </label> <br>";
        }
    ?>
</div>
</div>
     
    ¿Qué es lo más difícil que has hecho en tu vida? <input class="text-slam" type="text" name="dificil" value="<?php echo $rw_slam['dificil']; ?>"> <br>
    ¿Cuál es el lugar más lindo donde has estado? <input class="text-slam" type="text" name="lugar_lindo" value="<?php echo $rw_slam['lugar_lindo']; ?>"> <br>
    ¿Has tenido algún amor prohibido?
<div class="formulario">
	<div class="radio">
    <?php
        if($rw_slam['amor_prohibido'] == 'si'){
            echo "<input id = 'ss' type='radio' name='amor_prohibido' value='si' checked> <label for = 'ss'> Si</label>
            <input id = 'nn' type='radio' name='amor_prohibido' value='no'> <label for = 'nn'> Si</label> <br>";
        }
        elseif($rw_slam['amor_prohibido'] == 'no'){
           echo "<input id = 'ss' type='radio' name='amor_prohibido' value='si' > <label for = 'ss'> Si</label>
            <input id = 'nn' type='radio' name='amor_prohibido' value='no' checked> <label for = 'nn'> Si</label> <br>";
        }
        else{
          echo "<input id = 'ss' type='radio' name='amor_prohibido' value='si'> <label for = 'ss'> Si</label>
            <input id = 'nn' type='radio' name='amor_prohibido' value='no'> <label for = 'nn'> Si</label> <br>";
        }
    ?>
</div>
</div>

    ¿Qué es lo mejor que te ha pasado hasta el momento? <input class="text-slam" type="text" name="mejor_pasado" value="<?php echo $rw_slam['mejor_pasado']; ?>"> <br>



    <input type="submit" style="margin-left: 90%; margin-top: 5%;" class="btn-slam btn-slam-ver" name="Submit" value="Guardar (3 de 5)">
    </form>
</div>
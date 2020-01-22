<script language="JavaScript" type="text/javascript" src="js/slam.js"></script>
<?php
$usuario = $_SESSION['usuario'];

$sql = "SELECT * FROM slam WHERE usuario = '$usuario'";
$eje = pg_query($dbcon, $sql);
$rw_slam = pg_fetch_array($eje);
?>

<div id="resultado">
    <form name="slam_5" action="" onsubmit="enviarSlam5(); return false">

    Si pudieras implantar una regla que todos deberíamos de seguir ¿cuál sería? <input class="text-slam" type="text" name="regla" value="<?php echo $rw_slam['regla']; ?>"> <br>
    En tu grupo de amigos ¿qué papel juegas? <input class="text-slam" type="text" name="grupo" value="<?php echo $rw_slam['grupo']; ?>"> <br>
    ¿Cuál es el error que más número de veces has cometido? <input class="text-slam" type="text" name="error" value="<?php echo $rw_slam['error']; ?>"> <br>
    Si tuvieras el poder de regresar el tiempo ¿a que momento de tu vida regresarías? <input class="text-slam" type="text" name="regresarias" value="<?php echo $rw_slam['regresarias']; ?>"> <br>
    ¿Escribirías un libro sobre tu vida?
    <div class="formulario">
    <div class="radio">
    <?php
            if($rw_slam['biografia'] == 'si'){
                echo "<input type='radio' name='biografia' value='si' id = 's' checked> <label for = 's'> Si </label>
                <input type='radio' name='biografia' value='no' id = 'n'> <label for = 'n'> No </label> <br>";
            }
            elseif($rw_slam['biografia'] == 'no'){
                echo "<input type='radio' name='biografia' value='si' id = 's'> <label for = 's'> Si </label>
                <input type='radio' name='biografia' value='no' id = 'n' checked> <label for = 'n'> No </label> <br>";
            }
            else{
            echo "<input type='radio' name='biografia' value='si' id = 's'> <label for = 's'> Si </label>
                <input type='radio' name='biografia' value='no' id = 'n'> <label for = 'n'> No </label> <br>";
            }
        ?>
    </div>
	</div>

    ¿Dónde te gustaria vivir? <input class="text-slam" type="text" name="vivir" value="<?php echo $rw_slam['vivir']; ?>"> <br>

    Llegó el fin de semana ¿Prefieres salir o quedarte en casa?
    <div class="formulario">
    	<div class="radio">
    <?php
            if($rw_slam['fin'] == 'salir'){
                echo "<input type='radio' name='fin' value='salir' id = 'salir' checked> <label for='salir'> Salir </label>
                <input type='radio' name='fin' value='quedarme' id = 'quedar'> <label for='quedar'> Quedarme en casa</label> <br>";
            }
            elseif($rw_slam['fin'] == 'quedarme'){
                echo "<input type='radio' name='fin' value='salir' id = 'salir'> <label for='salir'> Salir </label>
                <input type='radio' name='fin' value='quedarme' id = 'quedar' checked> <label for='quedar'> Quedarme en casa</label> <br>";
            }
            else{
            echo "<input type='radio' name='fin' value='salir' id = 'salir'> <label for='salir'> Salir </label>
                <input type='radio' name='fin' value='quedarme' id = 'quedar'> <label for='quedar'> Quedarme en casa</label> <br>";
            }
        ?>
    </div>
</div>

    
    <input type="submit" style="margin-left: 90%; margin-top: 5%;" class="btn-slam btn-slam-ver" name="Submit" value="Guardar (5 de 5)">
    </form>
</div>
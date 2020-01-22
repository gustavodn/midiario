<script language="JavaScript" type="text/javascript" src="js/slam.js"></script>
<?php
$usuario = $_SESSION['usuario'];

$sql = "SELECT * FROM slam WHERE usuario = '$usuario'";
$eje = pg_query($dbcon, $sql);
$rw_slam = pg_fetch_array($eje);
?>
<div id="resultado">
    <form name="slam_4" action="" onsubmit="enviarSlam4(); return false">

    ¿Qué piensas de la sociedad actual? <input class="text-slam" type="text" name="sociedad" value="<?php echo $rw_slam['sociedad']; ?>"> <br>
    ¿Qué es lo más impresionante que sabes hacer? <input class="text-slam" type="text" name="impresionante" value="<?php echo $rw_slam['impresionante']; ?>"> <br>
    ¿Qué es lo que nunca volverías a hacer? <input class="text-slam" type="text" name="no_volverias" value="<?php echo $rw_slam['no_volverias']; ?>"> <br>
    Físicamente hablando ¿Qué crees que ven primero las personas de ti? <input class="text-slam" type="text" name="fisicamente" value="<?php echo $rw_slam['fisicamente']; ?>"> <br>
    ¿Qué es lo que más te atrae de una persona del sexo opuesto al tuyo?  <input class="text-slam" type="text" name="sexo_opuesto" value="<?php echo $rw_slam['sexo_opuesto']; ?>"> <br>
    ¿Qué moda o tendencia te gustaría que regrese? <input class="text-slam" type="text" name="moda" value="<?php echo $rw_slam['moda']; ?>"> <br>
    ¿Te consideras una persona orgullosa?
    <div class="formulario">
    <div class="radio">
    <?php
            if($rw_slam['orgullo'] == 'si'){
                echo "<input type='radio' name='orgullo' value='si' checked id = 's'> <label for = 's'>Si </label>
                <input type='radio' name='orgullo' value='no' id = 'n'> <label for = 'n'>No </label> <br>";
            }
            elseif($rw_slam['orgullo'] == 'no'){
                 echo "<input type='radio' name='orgullo' value='si' id = 's'> <label for = 's'>Si </label>
                <input type='radio' name='orgullo' value='no' checked id = 'n'> <label for = 'n'>No </label> <br>";
            }
            else{
             echo "<input type='radio' name='orgullo' value='si' id = 's'> <label for = 's'>Si </label>
                <input type='radio' name='orgullo' value='no' id = 'n'> <label for = 'n'>No </label> <br>";
            }
        ?>
    </div>
    </div>

    <input type="submit" style="margin-left: 90%; margin-top: 5%;" class="btn-slam btn-slam-ver" name="Submit" value="Guardar (4 de 5)">
    </form>
</div>
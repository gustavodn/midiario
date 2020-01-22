<script language="JavaScript" type="text/javascript" src="js/slam.js"></script>
<?php
$usuario = $_SESSION['usuario'];

$sql = "SELECT * FROM slam WHERE usuario = '$usuario'";
$eje = pg_query($dbcon, $sql);
$rw_slam = pg_fetch_array($eje);
?>

                <div id="resultado">
                    <form name="slam_2" action="" onsubmit="enviarSlam2(); return false">
                    En el amor ¿escuchas a tu corazón o a tu cerebro?
<div class="formulario">
    <div class="radio">
    <?php
        if($rw_slam['amor'] == 'cerebro'){
            echo "<input id = 'cer' type='radio' name='amor' value='cerebro' checked> <label for = 'cer'>Cerebro</label>
            <input id = 'cor' type='radio' name='amor' value='corazon'> <label for = 'cor'> Corazon </label> <br>";
        }
        elseif($rw_slam['amor'] == 'corazon'){
            echo "<input id = 'cer' type='radio' name='amor' value='cerebro'> <label for = 'cer'>Cerebro</label>
            <input id = 'cor' type='radio' name='amor' value='corazon' checked> <label for = 'cor'> Corazon </label> <br>";
        }
        else{
           echo "<input id = 'cer' type='radio' name='amor' value='cerebro'> <label for = 'cer'>Cerebro</label>
            <input id = 'cor' type='radio' name='amor' value='corazon'> <label for = 'cor'> Corazon </label> <br>";
        }
    ?>
    </div>
</div>
                   ¿Cuál es tu mayor fobia? <input class="text-slam" type="text" name="fobia" value="<?php echo $rw_slam['fobia']; ?>"> <br>
                   ¿Juzgas a un libro por su cubierta? <input class="text-slam" type="text" name="cubierta" value="<?php echo $rw_slam['cubierta']; ?>"> <br>
    ¿Quién te inspira a ser mejor persona y a superarte? <input class="text-slam" type="text" name="persona" value="<?php echo $rw_slam['persona']; ?>"> <br>
    ¿Qué es lo mas extraño que has visto? <input class="text-slam" type="text" name="extrano" value="<?php echo $rw_slam['extrano']; ?>"> <br>
    ¿Cuál es una de las cosas que jamás harías en tu vida? <input class="text-slam" type="text" name="no_harias" value="<?php echo $rw_slam['no_harias']; ?>"> <br>
    ¿Prefieres ahorrar o darte un gusto?
    
<div class="formulario">
                <div class="radio">
                    <?php
                    if($rw_slam['prefieres'] == 'ahorrar'){
                        echo "<input type='radio' name='prefieres' id='1' value='ahorrar' checked> <label for='1'>Ahorrar</label>
                        <input type='radio' name='prefieres' id='2' value='gusto'> 
                        <label for = '2'>Darte un Gusto </label><br>";
                    }
                    elseif($rw_slam['prefieres'] == 'gusto'){
                        echo "<input id = '1' type='radio' name='prefieres' value='ahorrar' > <label for='1'>Ahorrar</label>
                        <input id = '2' type='radio' name='prefieres' value='gusto' checked> <label for = '2'>Darte un Gusto </label> <br>";
                    }
                    else{
                        echo "<input id = '1' type='radio' name='prefieres' value='ahorrar'> <label for='1'>Ahorrar</label>
                        <input id = '2' type='radio' name='prefieres' value='gusto'><label for = '2'>Darte un Gusto </label><br>";
                    }
                    ?>
                </div>
            </div>
            <input type="submit" style="margin-left: 90%; margin-top: 5%;" class="btn-slam btn-slam-ver" name="Submit" value="Guardar (2 de 5)">
        </form>
        </div>

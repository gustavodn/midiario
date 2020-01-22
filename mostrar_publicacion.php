<?php
// incluimos un controlador para la conexión
require ("includes/db.php");
$id = $_GET['id'];

$sql = "SELECT * FROM entrada WHERE id = '$id'";
$eje = pg_query($dbcon, $sql);
$result = pg_fetch_array($eje);

echo $result['desarrollo'];
?>
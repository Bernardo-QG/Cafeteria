<?php

include 'conexion.php';

$conexion = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($conexion->connect_error) {
 die("La conexion fall�: " . $conexion->connect_error);
} 

$cond=$_GET["name"];
$sql = "DELETE FROM alumno WHERE nua = '$cond'";

$conexion->select_db("pruebas");

$conexion->query($sql);

mysqli_close($conexion); 

?>
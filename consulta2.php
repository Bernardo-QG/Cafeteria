<?php
session_start();
?> 

<?php

include 'conexion.php';

$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);
if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
} 

$cond=$_GET["name"];
$sql = "DELETE FROM alumno WHERE nua = '$cond'";

$conexion->select_db("pruebas");

$conexion->query($sql);

mysqli_close($conexion); 

?>
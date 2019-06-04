<?php

include 'conexion.php';

$conexion = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($conexion->connect_error) {
 die("La conexion fall�: " . $conexion->connect_error);
} 

$cond=$_GET["name"];
$sql = "DELETE FROM pedidos WHERE id_pedido = '$cond'";

$conexion->select_db("cafeteria");

$conexion->query($sql);

mysqli_close($conexion); 

?>


<?php

include 'conexion.php';

$conexion = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($conexion->connect_error) {
 die("La conexion fallo: " . $conexion->connect_error);
} 

$sql = "select * from menu inner join pedidos on id_platillo = fid_platillo inner join guisados on id_guisado = fid_guisado";
$result = mysqli_query($conexion, $sql);

if (mysqli_num_rows($result)>0) {
	while($row = mysqli_fetch_assoc($result)) {
		$datosPedidos["AllPedidos"][] = $row;

	}

} 
	echo json_encode($datosPedidos);

mysqli_close($conexion); 
?>
<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "cafeteria";
 
$con = mysqli_connect($db_host, $db_user, $db_pass, $db_name, 3307);
 
if(mysqli_connect_errno()){
	echo 'No se pudo conectar a la base de datos : '.mysqli_connect_error();
}
else{
	$buscar = $_GET['buscar'];
	if($buscar != ""){
		$sql = "SELECT * FROM menu WHERE nombre_platillo LIKE '%$buscar%' OR elaboracion LIKE '%$buscar%'";
	}
	else{
		$sql = "SELECT * FROM Menu WHERE estado_menu = 1";
	}
	$result = mysqli_query($con, $sql);
	if (mysqli_num_rows($result)>0) {
   		 while($row = mysqli_fetch_assoc($result)) {
			$datosMenu["AllMenu"][] = $row;
		}
		
	} 
	$sql = "SELECT * FROM Guisados WHERE estado_guisado = 1";
	$result = mysqli_query($con, $sql);
	if (mysqli_num_rows($result)>0) {
   		 while($row = mysqli_fetch_assoc($result)) {
			$datosGuisados["AllGuisados"][] = $row;
		}
	
	} 
	$sql = "select * from menu inner join pedidos on id_platillo = fid_platillo inner join guisados on id_guisado = fid_guisado";
	$result = mysqli_query($con, $sql);
	if (mysqli_num_rows($result)>0) {
   		 while($row = mysqli_fetch_assoc($result)) {
			$datosPedidos["AllPedidos"][] = $row;
		}
	
	} 
	echo json_encode($datosMenu+$datosGuisados+$datosPedidos);
	mysqli_close($con);
}
?>
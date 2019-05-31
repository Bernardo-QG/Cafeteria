<?php
/*Datos de conexion a la base de datos*/

$db_host = "localhost:3306";
$db_user = "BQG";
$db_pass = "BQG";
$db_name = "cafeteria";
 
$con = mysqli_connect($db_host, $db_user, $db_pass, $db_name) 
or die('Not connected : Ah sh*t ' . mysqli_connect_error());
 
if(!mysqli_connect_errno()){
	$sql = "SELECT * FROM Menu";
	$result = mysqli_query($con, $sql);

	if (mysqli_num_rows($result)>0) {
    // output data of each row
   		 while($row = mysqli_fetch_assoc($result)) {
		//	echo "id: " . $row["id_platillo"]. " - Name: " . $row["nombre_platillo"]. " " . $row["precio"]. "<br>";
			$datosMenu["AllMenu"][] = $row;
		}
		
	} 

	$sql = "SELECT * FROM Guisados";
	$result = mysqli_query($con, $sql);

	if (mysqli_num_rows($result)>0) {
    // output data of each row
   		 while($row = mysqli_fetch_assoc($result)) {
		//	echo "id: " . $row["id_platillo"]. " - Name: " . $row["nombre_platillo"]. " " . $row["precio"]. "<br>";
			$datosGuisados["AllGuisados"][] = $row;
		}
	
	} 
	echo json_encode($datosMenu+$datosGuisados);

	mysqli_close($con);

}

?>
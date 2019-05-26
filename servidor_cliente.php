<?php
/*Datos de conexion a la base de datos*/

$db_host = "localhost:3306";
$db_user = "BQG";
$db_pass = "BQG";
$db_name = "mysql";
 
$con = mysqli_connect($db_host, $db_user, $db_pass, $db_name) 
or die('Not connected : Ah sh*t ' . mysqli_connect_error());
 
if(mysqli_connect_errno()){
	echo 'No se pudo conectar a la base de datos : '.mysqli_connect_error();
}

?>
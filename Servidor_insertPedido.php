<?php
/*Datos de conexion a la base de datos*/

$db_host = "localhost:3306";
$db_user = "BQG";
$db_pass = "BQG";
$db_name = "cafeteria";
 
$con = mysqli_connect($db_host, $db_user, $db_pass, $db_name) 
or die('Not connected : Ah sh*t ' . mysqli_connect_error());
 



if(!mysqli_connect_errno()){
    try{

    $guisado=$_GET["guisado"];
    $platillo=$_GET["platillo"];
    $nombre=$_GET["nombre"];
    // echo $nombre.$platillo.$guisado;
    
	$sql = "INSERT INTO pedidos (nombre_cliente,fid_platillo,fid_guisado) VALUE('$nombre','$platillo','$guisado')";
    mysqli_query($con, $sql);
    echo "Correcto";
    
    }
    catch(Exception $e){
        echo "Inorrecto";
    }   
    mysqli_close($con);
}

?>
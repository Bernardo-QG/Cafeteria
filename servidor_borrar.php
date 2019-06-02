<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "cafeteria";
 
$con = mysqli_connect($db_host, $db_user, $db_pass, $db_name, 3307);
$result = 0;
 
if(mysqli_connect_errno()){
	echo 'No se pudo conectar a la base de datos : '.mysqli_connect_error();
}
else{
    $id = $_GET['id'];
    $op = $_GET['op'];
    if($op == 1){
        $sql = mysqli_query($con, "SELECT * FROM menu WHERE id_platillo=$id");
        $delete = mysqli_query($con, "UPDATE menu SET estado_menu = 0 WHERE id_platillo=$id");
    }
    else if($op == 2){
        $sql = mysqli_query($con, "SELECT * FROM guisados WHERE id_guisado=$id");
        $delete = mysqli_query($con, "UPDATE guisados SET estado_guisado = 0 WHERE id_guisado=$id");
    }
}
if($delete){
    $result = 1;
}

    echo $result;
    mysqli_close($con);
?>
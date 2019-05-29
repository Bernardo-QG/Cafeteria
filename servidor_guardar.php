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
    $id = $_GET['id'];
    $op = $_GET['op'];
    if($id == 0){
        if($op == 1){
            $p1 = $_GET['p1'];
            $p2 = $_GET['p2'];
            $p3 = $_GET['p3'];
            $sql = "INSERT INTO menu (nombre_platillo, elaboracion, precio, estado_menu) value('$p1', '$p2', '$p3', 1)";
        }
        else{
            $p1 = $_GET['p1'];
            $sql = "INSERT INTO guisados (nombre_guisado, estado_guisado) value ('$p1', 1)";
        }
    }
    else{
        if($op == 1){
            $p1 = $_GET['p1'];
            $p2 = $_GET['p2'];
            $p3 = $_GET['p3'];
            $sql = "UPDATE menu SET nombre_platillo='$p1', elaboracion='$p2', precio='$p3'  WHERE id_platillo=$id";
        }
        else{
            $p1 = $_GET['p1'];
            $sql = "UPDATE guisados SET nombre_guisado='$p1' WHERE id_guisado=$id";
        }
    }
}
$guardar = mysqli_query($con, $sql);

if($guardar){
    $result = 1;
}
else{
    $result = 0;
}

    echo $result;
    mysqli_close($con);
?>
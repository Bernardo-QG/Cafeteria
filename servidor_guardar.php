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
    $id = $_POST['id'];
    $op = $_POST['opcion'];
    if($id == 0){
        if($op == 1){
            $p1 = $_POST['p1'];
            $p2 = $_POST['p2'];
            $p3 = $_POST['p3'];
            $consulta = mysqli_query($con, "SELECT * from menu");
            $i = mysqli_num_rows($consulta) + 1;
            $sql = "INSERT INTO menu (nombre_platillo, elaboracion, imagen, precio, estado_menu) value('$p1', '$p2', './imagenes/$i.jpg', '$p3', 1)";
            rename ("./imagenes/100.jpg", "./imagenes/$i.jpg");
        }
        else{
            $p1 = $_POST['p1'];
            $sql = "INSERT INTO guisados (nombre_guisado, estado_guisado) value ('$p1', 1)";
        }
    }
    else{
        if($op == 1){
            $p1 = $_POST['p1'];
            $p2 = $_POST['p2'];
            $p3 = $_POST['p3'];
            $sql = "UPDATE menu SET nombre_platillo='$p1', elaboracion='$p2', precio='$p3'  WHERE id_platillo=$id";
            $aux = $_POST['n'];
            if($aux == 1){
                rename ("./imagenes/$id.jpg", "./imagenes/0.jpg");
                rename ("./imagenes/100.jpg", "./imagenes/$id.jpg");
            }
        }
        else{
            $p1 = $_POST['p1'];
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
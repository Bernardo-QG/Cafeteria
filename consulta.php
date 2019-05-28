<?php
session_start();
?> 

<?php

include 'conexion.php';

$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);
if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
} 

$sql = "SELECT * FROM alumno";
$conexion->select_db("pruebas");
$result = $conexion->query($sql, MYSQLI_USE_RESULT);

$i=1;
echo "<table align=center border=2> ";
while ($fila=$result->fetch_assoc()){
//$nombred = explode(" ", $fila["Nombre"]);

echo "<tr> <td align=center width=100> ".$fila["NUA"]."</td> <td align=center width=300 > 
".$fila["Nombre"]." </td> <td align=center width=100 >"." 
<button class=mio style=background-color: black; color: white; id=".$i." value=".$fila["NUA"]." 
onclick="."guarda2(this)".">"."<strong>Listo</strong>"."</button> </td> </tr>";

$i++;
}
echo " </table>";
mysqli_close($conexion); 

?>
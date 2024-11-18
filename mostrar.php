<?php
include 'conexion.php'; 
$con = conectar();

if (!$con) {
    die("Error en la conexión a la base de datos: " . mysqli_connect_error());
}


$sql = "SELECT * FROM formulario";
$query = mysqli_query($con, $sql);

if (!$query) {
    die("Error al realizar la consulta: " . mysqli_error($con));
}
?>


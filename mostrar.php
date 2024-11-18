<?php
include 'conexion.php'; // Archivo de conexión
$con = conectar();

if (!$con) {
    die("Error en la conexión a la base de datos: " . mysqli_connect_error());
}

// Consulta para obtener los usuarios registrados
$sql = "SELECT * FROM formulario";
$query = mysqli_query($con, $sql);

if (!$query) {
    die("Error al realizar la consulta: " . mysqli_error($con));
}
?>


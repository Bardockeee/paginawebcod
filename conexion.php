<?php
function conectar() {
    $host = "localhost";
    $user = "root";
    $password = ""; 
    $database = "panel"; 

    $conexion = mysqli_connect($host, $user, $password, $database);

    if (!$conexion) {
        die("Conexión fallida: " . mysqli_connect_error());
    }

    return $conexion;
}
?>
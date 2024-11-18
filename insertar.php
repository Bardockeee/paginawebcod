<?php 
include("conexion.php");
$con = conectar();

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña']; 
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$genero =  $_POST['genero'];
$roles = $_POST['roles'];

$sql = "INSERT INTO formulario (nombre, apellido, usuario, contraseña, email, telefono, genero, roles) 
        VALUES ('$nombre', '$apellido', '$usuario', '$contraseña', '$email', '$telefono', '$genero', '$roles')";
$query = mysqli_query($con, $sql);

if ($query) {
 
    header("Location: registrar.php?registro=exito");
} else {
    echo "Error en la inserción: " . mysqli_error($con);
}
?>

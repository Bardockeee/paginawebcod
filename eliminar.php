<?php

include("conexion.php");
$con = conectar();

$id=$_GET['id_registro'];


$sql = "DELETE FROM formulario WHERE id_registro='$id'";

$query = mysqli_query($con, $sql);

if ($query) {
    header("Location: panel.php");
} else {
    echo "Error en la eliminacion: " . mysqli_error($con);
}
?>
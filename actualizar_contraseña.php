<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = $_POST['token'];
    $nueva_contraseña = $_POST['contraseña'];
    $conexion = conectar();


    $sql = "SELECT email FROM formulario WHERE token_recuperacion = ? AND expiracion_token > NOW()";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param('s', $token);
    $stmt->execute();
    $stmt->bind_result($email);
    $stmt->fetch();

    if ($email) {

        $sql = "UPDATE formulario SET contraseña = ?, token_recuperacion = NULL, expiracion_token = NULL WHERE email = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param('ss', $nueva_contraseña, $email);
        $stmt->execute();

        echo "Tu contraseña ha sido actualizada con éxito.";
    } else {
        echo "El enlace no es válido o ha expirado.";
    }

    $stmt->close();
    $conexion->close();
}
?>

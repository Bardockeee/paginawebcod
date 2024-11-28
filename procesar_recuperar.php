<?php

include 'conexion.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $conexion = conectar();

    
    $sql = "SELECT id_registro FROM formulario WHERE email = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
       
        $token = bin2hex(random_bytes(50));
        $expira = date('Y-m-d H:i:s', strtotime('+1 hour'));

        
        $sql = "UPDATE formulario SET token_recuperacion = ?, expiracion_token = ? WHERE email = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param('sss', $token, $expira, $email);
        $stmt->execute();

        
        $enlace = "http://tu-dominio.com/restablecer.php?token=$token";
        $mensaje = "Hola,\n\nHaz clic en el siguiente enlace para restablecer tu contraseña:\n$enlace\n\nEste enlace es válido por 1 hora.";
        mail($email, "Recuperación de Contraseña", $mensaje, "From: no-reply@tu-dominio.com");

        echo "Se ha enviado un enlace de recuperación a tu correo.";
    } else {
        echo "El correo electrónico no está registrado.";
    }

    $stmt->close();
    $conexion->close();
}
?>

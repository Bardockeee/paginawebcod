<?php

include 'conexion.php';

if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $conexion = conectar();

    
    $sql = "SELECT email FROM formulario WHERE token_recuperacion = ? AND expiracion_token > NOW()";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param('s', $token);
    $stmt->execute();
    $stmt->bind_result($email);
    $stmt->fetch();

    if ($email) {
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Restablecer Contraseña</title>
        </head>
        <body>
            <h1>Restablecer Contraseña</h1>
            <form action="actualizar_contraseña.php" method="POST">
                <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">
                <label for="password">Nueva Contraseña:</label>
                <input type="password" id="password" name="contraseña" required>
                <button type="submit">Actualizar Contraseña</button>
            </form>
        </body>
        </html>
        <?php
    } else {
        echo "El enlace no es válido o ha expirado.";
    }

    $stmt->close();
    $conexion->close();
}
?>

<?php
include("conexion.php");
$con = conectar();

// Actualizar los datos si se envía el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recuperar datos del formulario
    $id = $_POST['id_registro'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $genero = $_POST['genero'];
    $roles = $_POST['roles'];

    // Consulta de actualización
    $sql = "UPDATE formulario 
            SET nombre='$nombre', apellido='$apellido', usuario='$usuario', 
            contraseña='$contraseña', email='$email', telefono='$telefono', 
            genero='$genero', roles='$roles' 
            WHERE id_registro='$id'";

    $query = mysqli_query($con, $sql);

    if ($query) {
        header("Location: panel.php");
        exit();
    } else {
        echo "Error al actualizar el registro: " . mysqli_error($con);
    }
}

// Recuperar datos del usuario a editar
if (isset($_GET['id_registro'])) {
    $id = $_GET['id_registro'];
    $sql = "SELECT * FROM formulario WHERE id_registro='$id'";
    $query = mysqli_query($con, $sql);

    if ($query && mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);
    } else {
        echo "Registro no encontrado.";
        exit();
    }
} else {
    echo "ID no especificado.";
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="container-fluid fondo-formulario">
        <form id="registroForm" method="POST">
            <h2 class="text-white text-center">Actualizar Usuario</h2>
            <!-- Campo oculto para enviar el ID -->
            <input type="hidden" name="id_registro" value="<?= $row['id_registro']; ?>">

            <div class="mb-3">
                <label for="nombres" class="form-label">Nombres:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $row['nombre']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="apellidos" class="form-label">Apellidos:</label>
                <input type="text" class="form-control" id="apellido" name="apellido" value="<?= $row['apellido']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="usuario" class="form-label">Usuario:</label>
                <input type="text" class="form-control" id="usuario" name="usuario" value="<?= $row['usuario']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="contrasena" class="form-label">Contraseña:</label>
                <input type="password" class="form-control" id="contrasena" name="contraseña" value="<?= $row['contraseña']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= $row['email']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono:</label>
                <input type="tel" class="form-control" id="telefono" name="telefono" value="<?= $row['telefono']; ?>" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Género:</label>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="genero" id="generoMasculino" value="Masculino" <?= $row['genero'] === 'Masculino' ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="generoMasculino">Masculino</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="genero" id="generoFemenino" value="Femenino" <?= $row['genero'] === 'Femenino' ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="generoFemenino">Femenino</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="genero" id="generoOtro" value="Otro" <?= $row['genero'] === 'Otro' ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="generoOtro">Otro</label>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="roles" class="form-label">Roles:</label>
                <select class="form-select" id="roles" name="roles" required>
                    <option value="Estudiante" <?= $row['roles'] === 'Estudiante' ? 'selected' : ''; ?>>Estudiante</option>
                    <option value="Profesor" <?= $row['roles'] === 'Profesor' ? 'selected' : ''; ?>>Profesor</option>
                    <option value="Investigador" <?= $row['roles'] === 'Investigador' ? 'selected' : ''; ?>>Investigador</option>
                    <option value="Desarrollador" <?= $row['roles'] === 'Desarrollador' ? 'selected' : ''; ?>>Desarrollador</option>
                </select>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-danger w-100">Actualizar</button>
            </div>
        </form>
    </div>
</body>
</html>


<?php
include("conexion.php");
$con = conectar();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $id = $_POST['id_registro'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $genero = $_POST['genero'];
    $roles = $_POST['roles'];


    $sql = "UPDATE formulario 
            SET nombre='$nombre', apellido='$apellido', usuario='$usuario', 
            contraseña='$contraseña', email='$email', telefono='$telefono', 
            genero='$genero', roles='$roles' 
            WHERE id_registro='$id'";

    $query = mysqli_query($con, $sql);

    if ($query) {
       
        header("Location: editar.php?id_registro=$id&actualizado=exito");
        exit();
    } else {
        echo "Error al actualizar el registro: " . mysqli_error($con);
    }
}


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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
</head>
<body>

<?php
 
    if (isset($_GET['actualizado']) && $_GET['actualizado'] === 'exito') {
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                var actualizacionExitosaModal = new bootstrap.Modal(document.getElementById('actualizacionExitosaModal'));
                actualizacionExitosaModal.show();
            });
        </script>";
    }
    ?>

    <div class="container-fluid fondo-formulario">
        <form id="registroForm" method="POST">
            <h2 class="text-white text-center">Actualizar Usuario</h2>
            
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
                <div class="input-group">
                    <input type="password" class="form-control" id="contrasena" name="contraseña" value="<?= $row['contraseña']; ?>" required>
                    <button class="btn btn-danger" type="button" id="togglePassword">
                        <i class="bi bi-eye"></i> 
                    </button>
                </div>
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
    <!-- Modal de éxito  -->
    <div class="modal fade" id="actualizacionExitosaModal" tabindex="-1" aria-labelledby="actualizacionExitosaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-dark text-white">
        <div class="modal-header border-secondary">
            <h5 class="modal-title" id="actualizacionExitosaLabel">¡Actualización Exitosa!</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Los datos se han actualizado correctamente.
        </div>
        <div class="modal-footer border-secondary">
            <button type="button" class="btn btn-light" onclick="redirigirPanel()">Aceptar</button>
        </div>
        </div>
    </div>
    </div>
    
    <script>
    function redirigirPanel() {
        window.location.href = 'panel.php'; 
    }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
            document.getElementById('togglePassword').addEventListener('click', function () {
            const passwordField = document.getElementById('contrasena');
            const passwordButton = document.getElementById('togglePassword');
            const icon = passwordButton.querySelector('i');

            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                icon.classList.remove('bi-eye');
                icon.classList.add('bi-eye-slash'); // Cambiar a icono de ojo tachado
            } else {
                passwordField.type = 'password';
                icon.classList.remove('bi-eye-slash');
                icon.classList.add('bi-eye'); // Cambiar a icono de ojo
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>    

</body>
</html>


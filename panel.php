<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de control</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent position-absolute w-100" style="z-index: 10;" data-bs-theme="dark">
        <div class="container">
            <a class="navbar-brand fs-4" href="#">
                <img src="img\logoindex.png" alt="Logo" width="60" height="60">
            </a>
            <a class="navbar-brand text-white" href="#"><span class="small">COD</span><br>Champions League</a>
    
            <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <!--sidebar-->
            <div class="sidebar offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                
                <!--sidebar encabezado-->
                <div class="offcanvas-header text-white border-bottom">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                    <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                
                <!--sidebar cuerpo-->
                <div class="offcanvas-body d-flex flex-column flex-lg-row p-4 p-lg-0">
                    <ul class="navbar-nav justify-content-center align-items-center fs-4 flex-grow-1 pe-3">
                        <li class="nav-item mx-2">
                            <a class="nav-link active" aria-current="page" href="index.html">Inicio</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="index.html#juegos">Juegos</a>
                        </li>
                        <li class="nav-item mx-2 dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Mas
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="index.html#noticias">Noticias</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="nosotros.html" target="_blank">Nosotros</a></li>
                            </ul>
                        </li>
                    </ul>
                    
                    <div class="d-flex flex-column flex-lg-row justify-content-center align-items-center gap-3">
                        <a href="registrar.php" class="text-white">Registrarse</a>
                        <a href="#" class="text-white text-decoration-none px-3 py-1 rounded-4" 
                           style="background-image:url(//www.callofduty.com/content/dam/atvi/callofduty/cod-touchui/blackops6/common/CerberusBtnAnim_6sec.gif)" 
                           data-bs-toggle="modal" data-bs-target="#loginModal">Ingresar</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    
    <!-- Modal de autenticación -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-teal">
                    <h5 class="modal-title" id="loginModalLabel">Iniciar sesión</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="username">Nombre de usuario</label>
                            <input type="text" class="form-control" id="username" placeholder="Nombre de usuario">
                        </div>
                        <div class="form-group mt-3">
                            <label for="password">Contraseña</label>
                            <input type="password" class="form-control" id="password" placeholder="Contraseña">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary">Iniciar sesión</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid fondo-formulario">
    <h1 class="text-center mb-5">Panel de Control</h1>
    <div>
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Usuario</th>
                    <th>Contraseña</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Género</th>
                    <th>Roles</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'mostrar.php'; // Incluye la consulta de datos

                // Verifica si hay registros
                if (mysqli_num_rows($query) > 0):
                    while ($row = mysqli_fetch_array($query)): ?>
                        <tr>
                            <td><?= $row['id_registro']; ?></td>
                            <td><?= $row['nombre']; ?></td>
                            <td><?= $row['apellido']; ?></td>
                            <td><?= $row['usuario']; ?></td>
                            <td>********</td> <!-- No mostrar la contraseña -->
                            <td><?= $row['email']; ?></td>
                            <td><?= $row['telefono']; ?></td>
                            <td><?= $row['genero']; ?></td>
                            <td><?= $row['roles']; ?></td>
                            <td>
                                <a href="editar.php?id_registro=<?= $row['id_registro']; ?>" class="btn btn-sm btn-warning">Editar</a>
                                <a href="eliminar.php?id_registro=<?= $row['id_registro']; ?>" class="btn btn-sm btn-danger" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#confirmDeleteModal" 
                                    data-id="<?= $row['id_registro']; ?>">
                                        Eliminar
                                </a>
                            </td>
                                
                        </tr>
                    <?php endwhile;
                else: ?>
                    <tr>
                        <td colspan="10" class="text-center">No hay usuarios registrados</td>
                    </tr>
                <?php endif; ?>
            </tbody>
            </table>
        </div>
    </div>

   
    <!-- Modal de Confirmación -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar Eliminación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¿Estás seguro de que deseas eliminar este registro? Esta acción no se puede deshacer.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <!-- Botón que redirige a eliminar.php -->
                <a href="eliminar.php?id_registro=<?= $row['id_registro']; ?>" id="confirmDeleteButton" class="btn btn-danger">Eliminar</a>
            </div>
        </div>
    </div>
</div>



    <script>
    // Capturar el evento cuando se abre el modal
    const confirmDeleteModal = document.getElementById('confirmDeleteModal');
    confirmDeleteModal.addEventListener('show.bs.modal', function (event) {
        // Botón que abrió el modal
        const button = event.relatedTarget;

        // Extraer el ID del atributo data-id
        const id = button.getAttribute('data-id');

        // Actualizar el enlace de confirmación con el ID
        const confirmDeleteButton = document.getElementById('confirmDeleteButton');
        confirmDeleteButton.href = `eliminar.php?id_registro=${id}`;
    });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ppEB3zY0OV6sUSRAOInxSTFjsJHme2lUUhblY8SmP1ln3SzYj7v22WcX3I33j72J" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

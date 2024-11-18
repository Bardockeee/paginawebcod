<?php
session_start(); 

$usuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;
?>
<?php
if (isset($_GET['registro']) && $_GET['registro'] === 'exito') {
    echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            var registroExitosoModal = new bootstrap.Modal(document.getElementById('registroExitosoModal'));
            registroExitosoModal.show();
        });
    </script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent position-absolute w-100" style="z-index: 10;" data-bs-theme="dark">
        <div class="container">
            <a class="navbar-brand fs-4" href="index.php">
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
                            <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="index.php#juegos">Juegos</a>
                        </li>
                        <li class="nav-item mx-2 dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Mas
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="index.php#noticias">Noticias</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="nosotros.php" target="_blank">Nosotros</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="panel.php" target="_blank">Panel de control</a></li>
                            </ul>
                        </li>
                    </ul>
                    
                    <div class="d-flex flex-column flex-lg-row justify-content-center align-items-center gap-3">
                    <?php if ($usuario): ?>
                        <span class="text-white me-3">Bienvenido, <?= htmlspecialchars($usuario); ?>!</span>
                        <a href="logout.php" class="btn btn-danger">Cerrar sesión</a>
                    <?php else: ?>
                        <a href="registrar.php" class="text-white">Registrarse</a>
                        <a href="#" class="text-white text-decoration-none px-3 py-1 rounded-4" 
                        style="background-image:url(//www.callofduty.com/content/dam/atvi/callofduty/cod-touchui/blackops6/common/CerberusBtnAnim_6sec.gif)" 
                        data-bs-toggle="modal" data-bs-target="#loginModal">Ingresar</a>
                    <?php endif; ?>
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
                        
                        <form action="login.php" method="POST">
                            <div class="form-group">
                                <label for="usuario">Nombre de usuario</label>
                                <input name="usuario" type="text" class="form-control" id="usuario" placeholder="Nombre de usuario" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="contraseña">Contraseña</label>
                                <input name="contraseña" type="password" class="form-control" id="contraseña" placeholder="Contraseña" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    <div class="container-fluid fondo-formulario">
        <form id="registroForm" action="insertar.php" method="POST">
            <h2 class="text-white text-center ">Registro</h2>
            <div class="mb-3">
                <label for="nombres" class="form-label">Nombres:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese su nombre">
            </div>
            <div class="mb-3">
                <label for="apellidos" class="form-label">Apellidos:</label>
                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Ingrese sus apellido">
            </div>
            <div class="mb-3">
                <label for="usuario" class="form-label">Usuario:</label>
                <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Ingrese su usuario">
            </div>
            <div class="mb-3">
                <label for="contrasena" class="form-label">Contraseña:</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="contrasena" name="contraseña" placeholder="Ingrese su contraseña" required>
                    <button class="btn btn-danger" type="button" id="togglePassword">
                        <i class="bi bi-eye"></i> <!-- Ícono del ojo -->
                    </button>
                </div>
            </div>


            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese su email">
            </div>
            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono:</label>
                <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Ingrese su teléfono">
            </div>
            
            <div class="mb-3">
                <label class="form-label">Genero:</label>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="genero" id="generoMasculino" value="Masculino">
                        <label class="form-check-label" for="sexoMasculino">Masculino</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="genero" id="generoFemenino" value="Femenino">
                        <label class="form-check-label" for="sexoFemenino">Femenino</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="genero" id="sexoOtro" value="Otro">
                        <label class="form-check-label" for="sexoOtro">Otro</label>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="roles" class="form-label">Roles:</label>
                <select class="form-select" id="roles" name="roles">
                    <option selected disabled>Seleccione un rol</option>
                    <option value="Estudiante">Estudiante</option>
                    <option value="Profesor">Profesor</option>
                    <option value="Investigador">Investigador</option>
                    <option value="Desarrollador">Desarrollador</option>
                </select>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-danger w-100">Registrar</button>
            </div>
        </form>
        <div class="progress mb-3">
            <div id="progressBar" class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
        </div>

        <!-- Modal de éxito -->
       
        <div class="modal fade" id="registroExitosoModal" tabindex="-1" aria-labelledby="registroExitosoLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-dark text-white">
            <div class="modal-header border-secondary">
                <h5 class="modal-title" id="registroExitosoLabel">¡Registro Exitoso!</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                El registro ha sido realizado correctamente.
            </div>
            <div class="modal-footer border-secondary">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Aceptar</button>
            </div>
            </div>
        </div>
        </div>



    </div>
    <footer class="bg-dark text-white py-4">
        <div class="container-fluid">
            <div class="row">
               
                <div class="col-md-3">
                    <h5 class="fw-bold">INFORMACIÓN DE CONTACTO</h5>
                    <p>Dirección: uda #777, Copiapó</p>
                    <p>Teléfono: 123-456-7890</p>
                    <p>Email: codchamps@support.com</p>
                    
                    <div class="d-flex gap-2 mt-3">
                        <a href="#" class="text-dark"><i class="bi bi-facebook fs-4"></i></a>
                        <a href="#" class="text-dark"><i class="bi bi-twitter fs-4"></i></a>
                        <a href="#" class="text-dark"><i class="bi bi-youtube fs-4"></i></a>
                        <a href="#" class="text-dark"><i class="bi bi-instagram fs-4"></i></a>
                    </div>
                </div>
                
                <div class="col-md-3">
                    <h5 class="fw-bold">INFORMACIÓN</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Acerca de Nosotros</a></li>
                        <li><a href="#">Políticas de Privacidad</a></li>
                        <li><a href="#">Términos y condiciones</a></li>
                        <li><a href="#">Contáctanos</a></li>
                    </ul>
                </div>
                
                <div class="col-md-3">
                    <h5 class="fw-bold">MI CUENTA</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Mi cuenta</a></li>
                        <li><a href="#">Historial</a></li>
                        <li><a href="#">Reembolsos</a></li>
                    </ul>
                </div>
                
                <div class="col-md-3">
                    <h5 class="fw-bold">BOLETÍN INFORMATIVO</h5>
                    <p>Suscríbete a nuestro canal para ver más contenido de nuestros torneos.</p>
                    <button class="btn btn-primary">SUSCRÍBETE</button>
                </div>
            </div>
            
            <hr class="my-4">
            
            <div class="text-center">
                <p>Desarrollado por Bardocke © 2024</p>
            </div>
        </div>
      </footer>
    
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
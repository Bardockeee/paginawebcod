<?php
session_start(); 

$usuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
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


        <div id="carouselExampleCaptions" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img\bo6-fondo.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img\call-of-duty-modern-warfare-3.webp" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Some representative placeholder content for the second slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img\call-duty-black-ops-2.webp" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Some representative placeholder content for the third slide.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <!-- Main -->
    <div class="container">
        <!-- Botones superiores -->
        <div class="row text-center my-4">
            <div class="col-md-4">
                <button class="btn btn-warning w-100">Torneos a nivel mundial</button>
            </div>
            <div class="col-md-4">
                <button class="btn btn-warning w-100">Guías y consejos</button>
            </div>
            <div class="col-md-4">
                <button class="btn btn-warning w-100">Servicio al cliente 24/7</button>
            </div>
        </div>

        <div class="container">
        <!-- Seccion juegos -->
        <h2 id="juegos" class="text-center text-white">Juegos</h2>
        <div class="row my-4">
            <div class="col-md-4">
                <div class="card bg-dark text-white">
                    <img src="img\bo2.jpeg" class="card-img" alt="Black Ops 2">
                    <div class="card-img-overlay ">
                        <h5 class="card-title mb-3">Black Ops 2</h5>
                        <a href="#" class="btn btn-outline-light">Ver más</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-dark text-white">
                    <img src="img\call-of-duty-modern-warfare-3.webp" class="card-img" alt="Mw3">
                    <div class="card-img-overlay ">
                        <h5 class="card-title mb-3">Modern Warfare 3</h5>
                        <a href="#" class="btn btn-outline-light">Ver más</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-dark text-white">
                    <img src="img\cw.jpg" class="card-img" alt="Cw">
                    <div class="card-img-overlay ">
                        <h5 class="card-title mb-3">Cold War</h5>
                        <a href="#" class="btn btn-outline-light">Ver más</a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Seccion Noticias -->
        <h2 id="noticias" class="text-center text-white">Noticias</h2>
        <div class="row my-4">
            <div class="col-md-4">
                <div class="card bg-dark text-white">
                    <img src="img\nysl-champs.jpg" class="card-img" alt="nysl">
                    <div class="card-img-overlay ">
                        <h5 class="card-title mb-3">Torneos</h5>
                        <a href="#" class="btn btn-outline-light">Ver más</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-dark text-white">
                    <img src="img\Pred.jpg" class="card-img" alt="Mw3">
                    <div class="card-img-overlay ">
                        <h5 class="card-title mb-3">Jugadores</h5>
                        <a href="#" class="btn btn-outline-light">Ver más</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-dark text-white">
                    <img src="img\call-of-duty-rank.jpg" class="card-img" alt="">
                    <div class="card-img-overlay ">
                        <h5 class="card-title mb-3">Clasificacion</h5>
                        <a href="#" class="btn btn-outline-light">Ver más</a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Seccion Mas -->
        <h2 class="text-center text-white">Mas</h2>
        <div class="row my-4">
            <div class="col-md-6">
                <div class="card bg-dark text-white">
                    <img src="img\ATL_FaZe.jpg" class="card-img" alt="Equipos">
                    <div class="card-img-overlay ">
                        <h5 class="card-title mb-3">Equipos</h5>
                        <a href="#" class="btn btn-outline-light">Ver más</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card bg-dark text-white">
                    <img src="img\ps5-controller.webp" class="card-img" alt="Consejos">
                    <div class="card-img-overlay ">
                        <h5 class="card-title mb-3">Consejos</h5>
                        <a href="#" class="btn btn-outline-light">Ver más</a>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    
    <!-- Footer -->
     <footer class=" bg-warning text-dark py-4">
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
                        <li><a href="#" class="text-dark">Acerca de Nosotros</a></li>
                        <li><a href="#" class="text-dark">Políticas de Privacidad</a></li>
                        <li><a href="#" class="text-dark">Términos y condiciones</a></li>
                        <li><a href="#" class="text-dark">Contáctanos</a></li>
                    </ul>
                </div>
                
                <div class="col-md-3">
                    <h5 class="fw-bold">MI CUENTA</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-dark">Mi cuenta</a></li>
                        <li><a href="#" class="text-dark">Historial</a></li>
                        <li><a href="#" class="text-dark">Reembolsos</a></li>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nosotros</title>
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
                        <a href="registrar.php" class="text-white">Registrarse</a>
                        <a href="#" class="text-white text-decoration-none px-3 py-1 rounded-4" 
                           style="background-image:url(//www.callofduty.com/content/dam/atvi/callofduty/cod-touchui/blackops6/common/CerberusBtnAnim_6sec.gif)" 
                           data-bs-toggle="modal" data-bs-target="#loginModal">Ingresar</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    
 
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

    <div class="about-hero text-center ">
        <h1>¿Quiénes Somos?</h1>
    </div>


    <div class="container my-5 text-white">
      
        <div class="row align-items-center mb-5">
            <div class="col-md-6">
                <h2 class="text-orange">Nuestra Misión</h2>
                <p class="text-white">
                    En COD Champions League, nos esforzamos por llevar el gaming competitivo de Call of Duty a todos los rincones del mundo.
                    Creamos un ambiente donde los jugadores pueden competir, desarrollarse y conectar con una comunidad apasionada.
                </p><br>Fomentamos el respeto, la excelencia y la inclusión para que cada jugador encuentre su lugar en este emocionante universo de eSports.
                
            </div>
            <div class="col-md-6">
                <img src="img\Pred.jpg" alt="Nuestra Misión" class="img-fluid rounded">
            </div>
        </div>

      
        <div class="row">
            <div class="col-md-6 mb-4">
                <h3 class="text-orange">Experiencias Extraordinarias</h3>
                <p class="text-white">
                    Ofrecemos experiencias de juego y eventos inolvidables que van más allá de lo convencional. Cada torneo es una oportunidad para celebrar el talento y la pasión de nuestros jugadores y fanáticos.
                </p>
            </div>
            <div class="col-md-6 mb-4">
                <h3 class="text-orange">Nuestros Valores</h3>
                <ul>
                    <li>Compromiso con la calidad y la transparencia.</li>
                    <li>Inclusión y respeto hacia todos los jugadores.</li>
                    <li>Fomento de la sana competencia y el crecimiento personal.</li>
                    <li>Innovación constante en la industria de los eSports.</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Footer -->
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
</body>
</html>

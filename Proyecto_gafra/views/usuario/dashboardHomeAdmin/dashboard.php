<?php
session_start();

// Verificar si el usuario no está autenticado
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: ../login.php"); // Corregir la ruta de redirección
    exit;
}

// Verificar si el usuario no es un administrador
if ($_SESSION['tipo_usuario'] !== 'administrador') {
    // Redirigir a una página de acceso no autorizado
    header("Location: ../acceso_no_autorizado.php");
    exit;
}

// Obtener el id del usuario si está definido
$id_usuario = isset($_SESSION['id_usuario']) ? $_SESSION['id_usuario'] : null;

// Cerrar sesión
if (isset($_GET['logout']) && $_GET['logout'] == 'true') {
    // Destruir todas las variables de sesión
    session_unset();
    // Destruir la sesión
    session_destroy();
    // Redirigir al usuario a la página indexHome.php
    header("Location: ../../login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documento</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="../../../assets/styleAdmin.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <header class="header">
        <a href="#" class="logo">Gafra</a>

        <input type="checkbox" id="check">
        <label for="check" class="icons">
            <i class='bx bx-menu' id="menu-icon"></i>
            <i class='bx bx-x' id="close-icon" ></i>
        </label>

        <nav class="navbar">
            <a href="#" style="--i:0;">Inicio</a>
            <a href="#" style="--i:2;">Servicios</a>
            <a href="#" style="--i:3;">Contactanos</a>
            <a href="#" style="--i:1;">Acerca de</a>
            <a href="?logout=true" style="--i:4;">Cerrar sesión</a>
        </nav>
    </header>
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <div class="card swiper-slide">
                <div class="card__image">
                    <img src="../../../assets/img/coordinador.png" alt="card image">
                </div>
                <div class="card__content">
                    <span class="card__title">Operarios</span>
                    <p class="card__text">El administrador tiene el control total para asignar roles y realizar cambios,
                        garantizando una integración fluida y eficiente para todos los usuarios.</p>
                    <a class="custom-button" href="/Proyecto_gafra/index.php?controller=usuarios&action=operarios">
                        <button class="card__btn">ENTRAR</button>
                    </a>
                </div>
            </div>
            <div class="card swiper-slide">
                <div class="card__image">
                    <img src="../../../assets/img/inventario.png" alt="card image">
                </div>

                <div class="card__content">
                    <span class="card__title">Inventario</span>
                    <p class="card__text">Permite a los usuarios administrar inventarios de manera efectiva, con el
                        administrador teniendo el control total para realizar ajustes y asignaciones</p>
                    <button class="card__btn">ENTRAR</button>
                    </a>
                </div>
            </div>

            <div class="card swiper-slide">
                <div class="card__image">
                    <img src="../../../assets/img/inventario_ins.png" alt="card image">
                </div>

                <div class="card__content">
                    <span class="card__title">Insumo</span>
                    <p class="card__text"> Es la herramienta clave para garantizar un flujo óptimo de insumos en el
                        proceso de producción o servicio."</p>
                    <button class="card__btn">ENTRAR</button>
                    </a>
                </div>
            </div>

            <div class="card swiper-slide">
                <div class="card__image">
                    <img src="../../../assets/img/solicitud.png" alt="card image">
                </div>

                <div class="card__content">
                    <span class="card__title">Solicitudes</span>
                    <p class="card__text">Permite a los usuarios enviar solicitudes, con el administrador supervisando y
                        coordinando el proceso</p>
                    <a class="custom-button" href="\Proyecto_gafra\views\SolicitudesAdmi\index.php">
                        <button class="card__btn">ENTRAR</button>
                    </a>
                </div>
            </div>

            <div class="card swiper-slide">
                <div class="card__image">
                    <img src="../../../assets/img/mensajero.png" alt="card image">
                </div>

                <div class="card__content">
                    <span class="card__title">Proveedores</span>
                    <p class="card__text">Es fundamental para asegurar relaciones eficientes y transparentes con los
                        proveedores, garantizando un suministro constante de productos y servicios de calidad. </p>
                    <a class="custom-button" href="/Proyecto_gafra/index.php?controller=proveedores&action=proveedores">
                        <button class="card__btn">ENTRAR</button>
                    </a>            
                </div>
            </div>

        </div>
        <div class="swiper-pagination"></div>
    </div>

    <script src= "https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js" ></script>

    <script>
        var swiper = new Swiper (".mySwiper", {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: "auto",
            coverflowEffect: {
                rotate: 0,
                stretch: 0,
                depth: 300,
                modifier: 1,
                slideShadows: false,
            },
            pagination: {
                el: ".swiper-pagination",
            },
        });
    </script>
</body>

</html>
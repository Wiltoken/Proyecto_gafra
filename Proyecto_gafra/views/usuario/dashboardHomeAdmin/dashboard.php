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
    <title>Gafra</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../../../assets/css/styleAdmin.css">
    <link rel="stylesheet" href="../../../assets/css/styles_Sider.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>

<body>
    <header class="header-container">
        <a href="#" class="header-logo">
            <!-- Aquí colocas la imagen -->
            <img src="../../../assets/css/img/logo.png" alt="Logo">
        </a>
        <div>
            <h1><?php echo strtoupper($_SESSION['tipo_usuario']); ?></h1>
            <!-- Aquí colocas tu párrafo -->
            <p><?php echo strtoupper("Panel"); ?></p>
        </div>
    </header>


    <nav class="sidebar">
        <div class="profile">
            <img src="../../../assets/css/img/Avatar.png" alt="profile_picture">
            <h3>
                <p><?php echo $_SESSION['nombre']; ?></p>
            </h3>
            <p><?php echo $_SESSION['apellido']; ?></p>
        </div>
        <i class='sidebar__arrow bx bx-chevron-right'></i>
        <ul class="sidebar__links">
            <li class="sidebar__link">
                <a href="#">
                    <i class='sidebar__link-icon bx bx-home-alt-2 bx-tada-hover'></i>
                    <span class="sidebar__link-name">Home</span>
                </a>
            </li>
            <li class="sidebar__link">
                <a href="#">
                    <i class='sidebar__link-icon bx bx-bar-chart-alt-2 bx-tada-hover'></i>
                    <span class="sidebar__link-name">Dashboard</span>
                </a>
            </li>
            <li class="sidebar__link">
                <a href="#">
                    <i class='sidebar__link-icon bx bx-bell bx-tada-hover'></i>
                    <span class="sidebar__link-name">Activity</span>
                </a>
            </li>

            <li class="sidebar__link">
                <a href="#">
                    <i class='sidebar__link-icon bx bx-cog bx-spin-hover'></i>
                    <span class="sidebar__link-name">Settings</span>
                </a>
            </li>
            <li class="sidebar__link sidebar__link--logout">
                <a href="?logout=true">
                    <i class='sidebar__link-icon bx bx-log-out'></i>
                    <span  class="sidebar__link-name">Log Out</span>
                </a>
            </li>
        </ul>
    </nav>

    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <div class="card swiper-slide">
                <div class="card__image">
                    <img src="../../../assets/css/img/coordinador.png" alt="card image">
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
                    <img src="../../../assets/css/img/inventario.png" alt="card image">
                </div>
                <div class="card__content">
                    <span class="card__title">Inventario</span>
                    <p class="card__text">Permite a los usuarios administrar inventarios de manera efectiva, con el
                        administrador teniendo el control total para realizar ajustes y asignaciones.</p>
                    <button class="card__btn">ENTRAR</button>
                </div>
            </div>
            <div class="card swiper-slide">
                <div class="card__image">
                    <img src="../../../assets/css/img/inventario_ins.png" alt="card image">
                </div>
                <div class="card__content">
                    <span class="card__title">Insumo</span>
                    <p class="card__text">Es la herramienta clave para garantizar un flujo óptimo de insumos en el
                        proceso de producción o servicio.</p>
                    <button class="card__btn">ENTRAR</button>
                </div>
            </div>
            <div class="card swiper-slide">
                <div class="card__image">
                    <img src="../../../assets/css/img/solicitud.png" alt="card image">
                </div>
                <div class="card__content">
                    <span class="card__title">Solicitudes</span>
                    <p class="card__text">Permite a los usuarios enviar solicitudes, con el administrador supervisando y
                        coordinando el proceso.</p>
                    <a class="custom-button" href="\Proyecto_gafra\views\SolicitudesAdmi\index.php">
                        <button class="card__btn">ENTRAR</button>
                    </a>
                </div>
            </div>
            <div class="card swiper-slide">
                <div class="card__image">
                    <img src="../../../assets/css/img/mensajero.png" alt="card image">
                </div>
                <div class="card__content">
                    <span class="card__title">Proveedores</span>
                    <p class="card__text">Es fundamental para asegurar relaciones eficientes y transparentes con los
                        proveedores, garantizando un suministro constante de productos y servicios de calidad.</p>
                    <a class="custom-button" href="/Proyecto_gafra/index.php?controller=proveedores&action=proveedores">
                        <button class="card__btn">ENTRAR</button>
                    </a>
                </div>
            </div>
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>

    <footer>
        <p>2024®️ Gafra todos los derechos reservados</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: "auto",
            coverflowEffect: {
                rotate: 50,
                stretch: 50,
                depth: 100,
                modifier: 1,
                slideShadows: true,
            },
            pagination: {
                el: ".swiper-pagination",
            },
            loop: true,
            speed: 1300,
            allowTouchMove: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });

        const arrow = document.querySelector('.sidebar__arrow');
        const sidebar = document.querySelector('.sidebar');

        arrow.addEventListener('click', () => {
            sidebar.classList.toggle('active');
        });
    </script>
</body>

</html>
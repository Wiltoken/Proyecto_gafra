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
    header("Location: ../../indexHome.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de administrador</title>
    <link rel="stylesheet" href="../assets/styles.css">
    <style>
        /* Estilos específicos para este archivo */
        body {
            padding: 20px;
            margin: 0;
            font-family: 'Roboto', sans-serif;
            background-color: #f5f5dc; /* Crema */
        }

        a {
            color: #01B1EA;
            text-decoration: none;
        }

        a:hover {
            color: #555555;
        }

        /* Estilos para el contenedor principal */
        .container {
            max-width: 1200px;
            margin: 20px auto; /* Agregado margen superior e inferior */
            display: flex;
            flex-direction: column; /* Para alinear el footer al final */
            min-height: 100vh; /* Para que el contenido ocupe al menos toda la altura de la ventana */
        }

        /* Estilos para el aside */
        #lateral {
    width: 96%;
    padding: 20px;
    background-color: #01B1EA;
    border-radius: 10px;
    margin-bottom: 20px;
}

#lateral img {
    width: 200px;
    height: 250px;
    margin-right: 20px;
}

#lateral h1 {
    font-size: 100px;
    color: black;
    margin: 0;
    text-align: left;
    flex-grow: 1;
    margin-top: 0; /* Eliminamos el margen superior */
}

.user-info-container {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
}

.user-info-container img {
    width: 200px;
    height: 250px;
    margin-right: 20px;
}

.user-info-container h1 {
    margin: 0;
    color: black;
    font-family: Arial, sans-serif;
}

.datos_usuario {
    background-color: #f5f5dc;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.datos_usuario p {
    
    margin: 10px 0;
    color: #333;
    font-size: 16px;
    font-family: Arial, sans-serif;
}
#user-info {
            color: black; /* Color de texto */
            margin-top: 10px; /* Espacio entre el título y la información del usuario */
            background-color: #f0f0f0; /* Fondo */
            padding: 10px; /* Espaciado interno */
            border-radius: 10px; /* Bordes redondeados */
        }

        #user-info p {
            margin: 5px 0; /* Espaciado entre cada línea de información */
        }

        .custom-text {
            margin: 5px 0;
        }

        /* Estilos para el contenido principal */
        main {
            flex-grow: 1;
            padding: 20px;
            display: flex; /* Modificado */
            flex-wrap: wrap; /* Modificado */
            justify-content: space-between; /* Modificado */
        }

        /* HEADER */
        #header {
            height: 80px;
            background-color: #f0f0f0; /* Color de fondo principal */
            background-image: linear-gradient(45deg, #85c1e9, #f0f0f0, #f5b041); /* Gradiente de colores */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            padding: 0 20px;
        }

        #header img {
            width: 25px;
            height: 25px;
        }

        #header nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        #header nav h1 {
            margin: 0;
            font-size: 24px;
            color: #01B1EA;
        }

        /* MENU */
        #menu {
            justify-content: center;
            clear: both;
            color: white;
            border-bottom: 4px solid #01B1EA;
            margin-bottom: 20px;
            padding: 5px;
            position: relative;
            transform: translate(0%, 10%);
        }

        .menu-buttons {
            display: flex;
            flex-wrap: wrap; /* Modificado */
            justify-content: space-between;
            position: relative;
            z-index: 1;
        }

        .custom-button {
            width: calc(20% - 40px); /* Distribuir el espacio equitativamente */
            max-width: 250px; /* Límite de ancho */
            height: 350px; /* Reduzco un poco la altura */
            border-radius: 20px;
            background-color: #01B1EA;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative; /* Añado posición relativa para superponer */
            z-index: 1; /* Añado un índice z para controlar la superposición */
            margin-bottom: 20px; /* Modificado */
        }

        .custom-button:hover {
            transform: scale(1.1);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            z-index: 2; /* Aumento el índice z al pasar el ratón para que se superpongan más */
        }

        .custom-button img {
            width: 100%;
            height: auto;
        }

        .custom-button-text {
            position: absolute;
            bottom: 10px;
            left: 0;
            width: 100%;
            margin: 0;
            padding: 0 10px;
            color: black;
            font-size: 14px;
            line-height: 20px;
            transition: bottom 0.3s ease;
        }

        .custom-button:hover .custom-button-text {
            bottom: 0;
        }

        /* Estilos para el footer */
        footer {
            background-color: #222222;
            color: white;
            text-align: center;
            padding: 20px 0;
            margin-top: auto; /* Ajusto el margen superior automáticamente */
            width: 100%;
            border-radius: 10px;
        }
        
        .logout-button {
            width: auto; /* Cambiado a 'auto' para ajustarse al contenido */
            text-align: center;
            margin-top: 20px;
            padding: 10px; /* Reducido el padding */
            background-color: #000000; /* Rojo */
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            position: fixed; /* Cambiado a posición fija */
            bottom: 20px; /* Alineado al borde inferior */
            right: 20px; /* Alineado al borde derecho */
        }

        .logout-button:hover {
            background-color: #ff0000; /* Rojo más oscuro al pasar el mouse */
        }

        @media screen and (max-width: 768px) {
            .custom-button {
                width: calc(33.33% - 20px); /* Distribuir el espacio equitativamente en dispositivos peque */
                max-width: none; /* Ajustar el ancho máximo */
            }
        }

        @media screen and (max-width: 480px) {
            .custom-button {
                width: calc(50% - 20px); /* Distribuir el espacio equitativamente en dispositivos aún más pequeños */
            }
        }
    </style>
</head>
<body>
<header id="header">
    <nav>
        <h1>Industrias Gafra</h1>
        <div>
            <img src="../../../assets/boton-de-notificaciones.png" alt="Notificaciones">
        </div>
    </nav>
</header>
<div class="container">
<aside id="lateral">
    <div class="user-info-container">
        <img src="../../../assets/Avatar.png" alt="Avatar">
        <div  class="datos_usuario">
        <?php if(isset($_SESSION['nombre']) && isset($_SESSION['apellido']) && isset($_SESSION['email']) && isset($_SESSION['telefono'])) { ?>
            <h1><p><?php echo $_SESSION['tipo_usuario']; ?></p></h1>
            <div>
                    <p>Nombre: <?php echo $_SESSION['nombre']; ?></p>
                    <p>Apellido: <?php echo $_SESSION['apellido']; ?></p>
                    <p>Correo: <?php echo $_SESSION['email']; ?></p>
                    <p>Teléfono: <?php echo $_SESSION['telefono']; ?></p>
                <?php } else { ?>
                    <p>No se en contraron datos de usuario en la sesión.</p>
                <?php } ?>
            </div>
        </div>
        <h1>Administrador</h1>
    </div>
</aside>

    <main>
        <div id="menu" class="menu-buttons">
            <!-- Continúa con los demás elementos del menú -->
            <a class="custom-button" href="/dashboard/Proyecto_gafra/index.php?controller=usuarios&action=operarios">
                <h3 class="custom-button-text">Operarios</h3>
                <img src="../../../assets/coordinador.png" alt="Operarios">
            </a>
            <a class="custom-button">
                <h3 class="custom-button-text">Inventario</h3>
                <img src="../../../assets/inventario.png" alt="Inventario">
            </a>
            <a class="custom-button">
                <h3 class="custom-button-text">Insumos</h3>
                <img src="../../../assets/inventario_ins.png" alt="Insumos">
            </a>
            <a class="custom-button" href="\Proyecto_gafra\views\SolicitudesAdmi\index.php">
                <h3 class = "custom-button-text" >Solicitudes</h3>
                <img src="../../../assets/solicitud.png" alt="Solicitudes">
            </a>
            <a class="custom-button" href="/dashboard/Proyecto_gafra/index.php?controller=proveedores&action=proveedores">
                <h3 class="custom-button-text">Proveedores</h3> <!-- Cambiado el texto -->
                <img src="../../../assets/mensajero.png" alt="Proveedores"> <!-- Cambiada la imagen -->
            </a>
        </div>
        <div class="logout-button">
            <a href="?logout=true">Cerrar sesión</a>
        </div>
    </main>

</div>
<footer>
    <p>2024®️ Gafra todos los derechos reservados</p>
</footer>
</body>
</html>


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

// Obtener el rol del usuario desde la base de datos o cualquier otra fuente de datos
// Suponiendo que ya has verificado las credenciales del usuario correctamente
// y que has obtenido el ID del usuario desde la base de datos

// Función para obtener el rol del usuario por ID desde la base de datos
function obtenerRolUsuarioPorId($id_usuario) {
    // Aquí deberías implementar la lógica para obtener el rol del usuario desde la base de datos
    // Retorna el rol del usuario o null si no se encuentra
    // Por ejemplo:
    // $rol = consulta_a_la_base_de_datos("SELECT rol FROM usuarios WHERE id = $id_usuario");
    // return $rol;
    // Por ahora, retornamos un valor fijo para propósitos de demostración
    return 'Administrador';
}

// Obtener el rol del usuario
$rol_usuario = obtenerRolUsuarioPorId($id_usuario);

// Almacenar el rol del usuario en una variable de sesión
$_SESSION['rol_usuario'] = $rol_usuario;

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

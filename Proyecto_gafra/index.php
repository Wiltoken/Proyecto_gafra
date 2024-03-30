<?php
session_start();
require_once 'autoload.php';

if (!isset($_SESSION['loggedin'])) {
    header('Location: views/login.php');
    exit;
}
// Verificar si se ha especificado un controlador y una acción
if(isset($_GET['controller'])){
    // Construir el nombre del controlador
    $nombre_controlador = $_GET['controller'].'Controller';

    // Verificar si la clase del controlador existe
    if(class_exists($nombre_controlador)){
        $controlador = new $nombre_controlador();

        // Verificar si se ha especificado una acción
        if(isset($_GET['action'])){
            $action = $_GET['action'];
            // Verificar si la acción es 'operarios'
            if($action === 'operarios') {
                // Llamar al método 'operarios' directamente en el controlador
                $controlador->operarios();
            } else if ( $action === 'proveedores') {
        
                // Llamar a la acción especificada
                $controlador->proveedores();
            } else {
                $controlador->$action();
            }
        } else {
            // Si no se especifica una acción, llamar al método 'index'
            $controlador->index();
        }
    } else {
        echo "El controlador que buscas no existe";
    }
} else {
    // Si no se especifica un controlador, redirigir a la página principal
    require_once 'views/indexHome.php';
}
?>

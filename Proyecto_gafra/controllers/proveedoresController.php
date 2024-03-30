<?php
class ProveedoresController {

    public function __construct(){

    }

    public function index(){
        // Obtener todos los proveedores
        $proveedores_model = new Proveedores(); 
        $proveedores = $proveedores_model->get_proveedores(); 
    
        $data["titulo"] = "Proveedores";
        $data["proveedores"] = $proveedores;
    
        require_once 'views/usuario/dashboardHomeAdmin/dashboardProvAdmin/dashboard_Proveedores.php';
    } 

    public function nuevo(){
        $data["titulo"] = "Nuevo Proveedor";
        require_once "views/usuario/dashboardHomeAdmin/dashboardProvAdmin/registro.php";
    }

    public function guardar(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtener el ID del usuario si está presente en el formulario
            $id = isset($_POST['id']) ? $_POST['id'] : null;
    
            // Obtener los datos del formulario
            $nombre = $_POST['nombre'];
            $direccion = $_POST['direccion'];
            $telefono = $_POST['telefono'];
            $correo = $_POST['correo'];
          
    
            // Crear una instancia del modelo Usuarios
            $proveedores = new Proveedores();
    
            // Verificar si se proporciona un ID
            if ($id) {
                // Actualizar el usuario existente en la base de datos
                $proveedores->modificar($id, $nombre, $direccion, $telefono, $correo);
            } else {
                // Insertar un nuevo usuario en la base de datos
                $proveedores->insertar($nombre, $direccion, $telefono, $correo);
            }
    
            // Redireccionar al usuario a la página de índice
            header("Location: index.php?controller=proveedores&action=index");
            exit;
        } else {
            // Manejar el caso en el que no sea una solicitud POST
            echo "Error: La solicitud debe ser de tipo POST.";
        }
    }

    public function actualizar(){
        // Obtener el ID del proveedor de la URL
        $id = $_GET['id'];
        
        // Obtener los datos del proveedor de la base de datos
        $proveedores = new Proveedores();
        $proveedor_actualizado = $proveedores->get_proveedor($id);
        
        // Verificar si se encontró el proveedor
        if ($proveedor_actualizado) {
            // Preparar los datos para pasarlos a la vista
            $data['titulo'] = "Modificar Proveedor";
            $data['proveedores'] = $proveedor_actualizado;
    
            // Cargar la vista modificar.php con los datos del proveedor
            require_once 'views/usuario/dashboardHomeAdmin/dashboardProvAdmin/modificar.php';
        } else {
            // Manejar el caso en el que no se encontró el proveedor
            echo "No se encontró el proveedor con el ID especificado.";
        }
    }

    public function eliminar() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['ids']) && !empty($_GET['ids'])) {
            $ids = explode(',', $_GET['ids']);
    
            $proveedores = new Proveedores();
            foreach ($ids as $id) {
                $proveedores->eliminar($id);
            }
            $data['titulo'] = "Proveedores";
            $this->index();
        } else {
            echo "Error: No se recibieron los IDs de los proveedores a eliminar.";
        }
    }
    public function proveedores() {
        // Verificar si la solicitud es GET y si proviene del botón de operarios
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'proveedores') {
            // Aquí puedes cargar los operarios desde la base de datos y pasarlos a la vista
            $proveedores_model = new Proveedores(); 
            $proveedores = $proveedores_model->get_proveedores(); 
    
            $data["titulo"] = "Proveedores";
            $data["proveedores"] = $proveedores;
    
            // Requerir la vista de operarios con los datos
            require_once 'views/usuario/dashboardHomeAdmin/dashboardProvAdmin/dashboard_Proveedores.php'; // Corregir esta línea
        } else {
            // Redireccionar a otra página o realizar alguna acción alternativa
        }
    }

}

?>

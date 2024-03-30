<?php
require_once 'models/usuarios.php'; 

class UsuariosController {

    public function __construct(){

    }

    public function index(){
        $usuarios_model = new Usuarios(); 
        $usuarios = $usuarios_model->get_usuarios(); 
    
        $data["titulo"] = "Usuarios";
        $data["usuarios"] = $usuarios;
    
        require_once 'views/usuario/dashboardHomeAdmin/dashboardOpeAdmin/dashboard_Operarios.php';
    } 

    public function nuevo(){
        $data["titulo"] = "Operarios";
        require_once "views/usuario/dashboardHomeAdmin/dashboardOpeAdmin/registro.php";
    }

    public function guardar(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtener el ID del usuario si está presente en el formulario
            $id = isset($_POST['id']) ? $_POST['id'] : null;
    
            // Obtener los datos del formulario
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $correo = $_POST['correo'];
            $clave_acceso = $_POST['clave_acceso'];
            $telefono = $_POST['telefono'];
            $tipo_usuario = $_POST['tipo_usuario'];
    
            // Crear una instancia del modelo Usuarios
            $usuarios = new Usuarios();
    
            // Verificar si se proporciona un ID
            if ($id) {
                // Actualizar el usuario existente en la base de datos
                $usuarios->modificar($id, $nombre, $apellido, $correo, $clave_acceso ,$telefono, $tipo_usuario);
            } else {
                // Insertar un nuevo usuario en la base de datos
                $usuarios->insertar($nombre, $apellido, $correo, $clave_acceso, $telefono, $tipo_usuario);
            }
    
            // Redireccionar al usuario a la página de índice
            header("Location: index.php?controller=usuarios&action=index");
            exit;
        } else {
            // Manejar el caso en el que no sea una solicitud POST
            echo "Error: La solicitud debe ser de tipo POST.";
        }
    }
    

    public function actualizar(){
        // Obtener el ID del usuario de la URL
        $id = $_GET['id'];
        
        
        // Obtener los datos del usuario de la base de datos
        $usuarios = new Usuarios();
        $usuario_actualizado = $usuarios->get_usuario($id);
        
        // Verificar si se encontró el usuario
        if ($usuario_actualizado) {
            // Preparar los datos para pasarlos a la vista
            $data['titulo'] = "Modificar Usuario";
            $data['usuarios'] = $usuario_actualizado;
    
            // Cargar la vista modificar.php con los datos del usuario
            require_once 'views/usuario/dashboardHomeAdmin/dashboardOpeAdmin/modificar.php';
        } else {
            // Manejar el caso en el que no se encontró el usuario
            echo "No se encontró el usuario con el ID especificado.";
        }
    }

    public function eliminar() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['ids']) && !empty($_GET['ids'])) {
            $ids = explode(',', $_GET['ids']);
    
            $usuarios = new Usuarios();
            foreach ($ids as $id) {
                $usuarios->eliminar($id);
            }
            $data['titulo'] = "Usuarios";
            $this->index();
        } else {
            echo "Error: No se recibieron los IDs de los usuarios a eliminar.";
        }
    }
    
    public function operarios() {
        // Verificar si la solicitud es GET y si proviene del botón de operarios
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'operarios') {
            // Aquí puedes cargar los operarios desde la base de datos y pasarlos a la vista
            $usuarios_model = new Usuarios(); 
            $usuarios = $usuarios_model->get_usuarios(); 
    
            $data["titulo"] = "Operarios";
            $data["usuarios"] = $usuarios;
    
            // Requerir la vista de operarios con los datos
            require_once 'views/usuario/dashboardHomeAdmin/dashboardOpeAdmin/dashboard_Operarios.php'; // Corregir esta línea
        } else {
            // Redireccionar a otra página o realizar alguna acción alternativa
        }
    }

    public function indexHome() {
        // Cargar la vista para la página principal
        require_once 'indexHome.php';
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtener los datos del formulario de inicio de sesión
            $correo = $_POST['correo'];

            $clave_acceso = $_POST['clave_acceso'];

            // Crear una instancia del modelo Usuarios
            $usuarios_model = new Usuarios();

            // Autenticar al usuario
            $usuario = $usuarios_model->autenticar($correo, $clave_acceso);

            if ($usuario) {
                // Usuario autenticado correctamente, redirigir a la página de inicio
                header("Location: index.php"); // Cambia la ruta según sea necesario
                exit;
            } else {
                // Usuario no autenticado, mostrar un mensaje de error o redirigir a la página de inicio de sesión nuevamente
                echo "Error: Credenciales incorrectas. Vuelve a intentarlo.";
            }
        } else {
            // Manejar el caso en el que no sea una solicitud POST
            echo "Error: La solicitud debe ser de tipo POST.";
        }
    }
}

?>

<?php
require_once 'models/solicitudes.php';

class SolicitudesController
{

    public function __construct()
    {
    }

    // Método para mostrar el listado de solicitudes
    public function index()
    {
        // Obtener todas las solicitudes
        $solicitudes_model = new Solicitudes();
        $solicitudes = $solicitudes_model->get_solicitudes();

        // Preparar los datos para pasarlos a la vista
        $data["titulo"] = "Solicitudes";
        $data["solicitudes"] = $solicitudes;

        // Cargar la vista correspondiente
        require_once '\Proyecto_gafra\views\SolicitudesOper\index.php';
    }

    // Método para mostrar el formulario de creación de nueva solicitud
    public function nuevo()
    {
        // Preparar los datos para pasarlos a la vista
        $data["titulo"] = "Nueva Solicitud";

        // Cargar la vista del formulario de registro
        require_once "\Proyecto_gafra\views\SolicitudesOper\crear.php";
    }

    // Método para guardar una nueva solicitud
    public function guardar()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtener los datos del formulario
            $fecha_solicitud = $_POST['fecha_solicitud'];
            $descripcion = $_POST['descripcion'];
            $estado = isset($_POST['estado']) ? $_POST['estado'] : "Pendiente"; // Valor por defecto: Pendiente
            $id_usuario = $_POST['id_usuario'];

            // Crear una instancia del modelo Solicitudes
            $solicitudes = new Solicitudes();

            // Insertar la nueva solicitud en la base de datos
            $solicitudes->insertar($fecha_solicitud, $descripcion, $estado,$id_usuario);
            // Redireccionar al usuario a la página de índice
            header("Location: index.php?controller=solicitudes&action=index");
            exit;
        } else {
            // Manejar el caso en el que no sea una solicitud POST
            echo "Error: La solicitud debe ser de tipo POST.";
        }
    }

    // Método para cargar la vista de modificación de una solicitud (no implementado aquí)

    // Método para eliminar una solicitud (no implementado aquí)

}

?>

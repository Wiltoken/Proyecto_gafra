<?php
require_once 'C:\xampp\htdocs\Proyecto_gafra\views\SolicitudesOper\head\head.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Solicitud</title>
    <!-- Agrega los enlaces a los estilos Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 p-4">
                <div class="table-responsive">
                    <table class="table table-bordered" style="width:100%;">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 10%;">#ID</th>
                                <th scope="col" style="width: 20%;">FECHA DE SOLICITUD</th>
                                <th scope="col" style="width: 30%;">DESCRIPCION</th>
                                <th scope="col" style="width: 20%;">ESTADO</th>
                                <th scope="col" style="width: 20%;">ID_USUARIO</th>
                                <th scope="col" style="width: 20%;">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>2024-03-30</td>
                                <td>Solicitud de vacaciones</td>
                                <td>Pendiente</td>
                                <td>123</td>
                                <td>
                                    <button class="btn btn-primary btn-sm">Actualizar</button>
                                    <button class="btn btn-danger btn-sm">Eliminar</button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>2024-04-01</td>
                                <td>Compra de suministros</td>
                                <td>Aprobado</td>
                                <td>456</td>
                                <td>
                                    <button class="btn btn-primary btn-sm">Actualizar</button>
                                    <button class="btn btn-danger btn-sm">Eliminar</button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>2024-04-02</td>
                                <td>Revisión de código</td>
                                <td>Rechazado</td>
                                <td>789</td>
                                <td>
                                    <button class="btn btn-primary btn-sm">Actualizar</button>
                                    <button class="btn btn-danger btn-sm">Eliminar</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <<div class="text-center">
                    <a href="\Proyecto_gafra\views\SolicitudesOper\crear.php" class="btn btn-success">Agregar</a>
                    <a href="\Proyecto_gafra\views\SolicitudesOper\historial.php" class="btn btn-info">Historial de Solicitudes</a>
            </div>

        </div>
    </div>
    </div>

    <!-- Agrega el script Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>

<?php
require_once 'C:\xampp\htdocs\Proyecto_gafra\views\SolicitudesOper\head\footer.php';
?>
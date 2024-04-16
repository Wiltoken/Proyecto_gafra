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
        <div class="tabla-botones">
        </div>
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
                            <?php if (isset($data["solicitudes"]) && is_array($data["solicitudes"])) : ?>
                                <?php foreach ($data["solicitudes"] as $solicitud) : ?>
                                    <tr>
                                        <td><input type="checkbox" class="row-checkbox" data-solicitud-id="<?php echo $solicitud['id']; ?>"></td>
                                        <td><?php echo $solicitud['id']; ?></td>
                                        <td><?php echo $solicitud['fecha_solicitud']; ?></td>
                                        <td><?php echo $solicitud['descripcion']; ?></td>
                                        <td><?php echo $solicitud['estado']; ?></td>
                                        <td><?php echo $solicitud['id_usuario']; ?></td>
                                        <td>
                                            <button class="btn btn-primary btn-sm">Actualizar</button>
                                            <button class="btn btn-danger btn-sm">Eliminar</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <<div class="text-center">
                    <a href="\Proyecto_gafra\views\SolicitudesOper\crear.php" href='index.php?controller=solicitudes&action=nuevo' class="btn btn-success">Agregar</a>
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
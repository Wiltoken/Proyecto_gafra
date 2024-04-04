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
        <h1 class="text-center p-3">GAFRA</h1>
        <div class="row justify-content-center">
            <form class="col-4">
                <h3 class="text-center text-secondary">Registro de Solicitudes</h3>
                <!-- Campo de ID -->
                <div class="mb-3">
                    <label for="id" class="form-label">ID de Solicitud</label>
                    <input type="text" class="form-control" id="id" name="id" readonly>
                    <!-- Aquí debes reemplazar el valor "123" con el ID real de la solicitud -->
                    <input type="hidden" name="id_usuario" value="123">
                </div>
                <!-- Campo de Fecha de Solicitud -->
                <div class="mb-3">
                    <label for="fecha_solicitud" class="form-label">Fecha de Solicitud</label>
                    <input type="date" class="form-control" name="fecha_solicitud">
                </div>
                <!-- Campo de Descripción -->
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea class="form-control" name="descripcion" rows="3"></textarea>

                    <!-- Si el usuario no es administrador, mostrar solo el estado como "Pendiente" -->
                    <div class="mb-3">
                        <label for="estado" class="form-label">Estado</label>
                        <input type="text" class="form-control" name="estado" value="Pendiente" readonly>
                    </div>
                <!-- Botón Guardar -->
                <button type="submit" class="btn btn-primary" name="btnguardar" value="ok">Guardar</button>
            </form>
        </div>
    </div>
</body>

</html>

<?php
require_once 'C:\xampp\htdocs\Proyecto_gafra\views\SolicitudesOper\head\footer.php';
?>

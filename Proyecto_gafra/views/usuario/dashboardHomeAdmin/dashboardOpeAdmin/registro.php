<?php
require_once 'C:\xampp\htdocs\Proyecto_gafra\views\usuario\dashboardHomeAdmin\dashboardOpeAdmin\head\head.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro de Usuarios</title>
  <link rel="stylesheet" href="/assets/style.css">
</head>

<body>
  <div class="container">
    <form id="nuevo" name="nuevo" method="POST" action="index.php?controller=usuarios&action=guardar" autocomplete="off">
      <h3 class="col-sm-6 mb-8">Operarios</h3>
      <div class="form-group row">
        <label for="nombre" class="col-sm-2 col-form-label">Nombre:</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
      </div>

      <div class="form-group row">
        <label for="apellido" class="col-sm-2 col-form-label">Apellido:</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" id="apellido" name="apellido" required>
        </div>
      </div>

      <div class="form-group row">
        <label for="correo" class="col-sm-2 col-form-label">Correo Electrónico:</label>
        <div class="col-sm-4">
          <input type="email" class="form-control" id="correo" name="correo" required>
        </div>
      </div>

      <div class="form-group row">
        <label for="clave_acceso" class="col-sm-2 col-form-label">Contraseña:</label>
        <div class="col-sm-4">
          <input type="password" class="form-control" id="clave_acceso" name="clave_acceso" required>
        </div>
      </div>

      <div class="form-group row">
        <label for="telefono" class="col-sm-2 col-form-label">Teléfono:</label>
        <div class="col-sm-4">
          <input type="tel" class="form-control" id="telefono" name="telefono">
        </div>
      </div>

      <div class="form-group row">
        <label for="tipo_usuario" class="col-sm-2 col-form-label">Tipo de Usuario:</label>
        <div class="col-sm-4">
          <select class="form-control" id="tipo_usuario" name="tipo_usuario" required>
            <option value="administrador">Administrador</option>
            <option value="operario_corte">Operario Corte</option>
            <option value="operario_ensamble">Operario Ensamble</option>
            <option value="operario_tuberia">Operario Tubería</option>
            <option value="operario_satelite">Operario Satélite</option>
          </select>
        </div>
      </div>

      <button id="guardar" name="guardar" type="submit" class="btn btn-primary">Guardar</button>
      <!-- Mensaje de confirmación -->
      <div class="confirmation-message">
        <?php
        if (isset($mensaje)) {
          echo $mensaje;
        }
        ?>
      </div>
    </form>
  </div>
  <div class="btn-back">
    <a href="views/usuario/dashboardHomeAdmin/dashboard.php" class="btn btn-secondary">
      <i class="fas fa-arrow-left"></i> Volver
    </a>
  </div>

  <!-- Agregando Bootstrap JS (opcional, solo si necesitas componentes de Bootstrap que requieren JS) -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- Agregar Font Awesome JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
</body>

</html>

<?php
require_once 'C:\xampp\htdocs\Proyecto_gafra\views\usuario\dashboardHomeAdmin\dashboardOpeAdmin\head\footer.php';
?>
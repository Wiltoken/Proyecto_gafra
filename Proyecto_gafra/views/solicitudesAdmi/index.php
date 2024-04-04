<?php
require_once 'C:\xampp\htdocs\Proyecto_gafra\views\solicitudesAdmi\head\head.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cartas de los Operarios</title>
    <!-- Incluir Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Cartas de los Operarios</h2>
        <div id="cartasOperarios">
            <!-- Las cartas de los operarios se cargarán aquí -->
        </div>
    </div>

    <!-- Modal para detalles de la carta -->
    <div class="modal fade" id="detalleCartaModal" tabindex="-1" role="dialog" aria-labelledby="detalleCartaModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detalleCartaModalLabel">Detalles de la Carta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><strong>ID del Usuario:</strong> <span id="idUsuario"></span></p>
                    <p><strong>Fecha:</strong> <span id="fechaOperario"></span></p>
                    <p><strong>Cargo:</strong> <span id="cargoOperario"></span></p>
                    <p><strong>Descripción:</strong> <span id="descripcionOperario"></span></p>
                    <!-- Nuevos detalles -->
                    <textarea class="form-control mt-3" id="mensajeRechazo" placeholder="Motivo del rechazo"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-danger" id="rechazarCartaBtn">Rechazar y Enviar Mensaje</button>
                    <button type="button" class="btn btn-success" id="aprobarCartaBtn">Aprobar y Enviar Comprobante</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Incluir Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // Simulación de datos de las cartas de los operarios
        const cartasOperarios = [{
                id: 1,
                id_usuario: "Usuario 1",
                fecha: "2024-04-05",
                cargo: "Ensamble",
                descripcion: "Descripción del Operario 1"
            },
            {
                id: 2,
                id_usuario: "Usuario 1",
                fecha: "2024-04-06",
                cargo: "Ensamble",
                descripcion: "Descripción del Operario 1"
            },
            {
                id: 3,
                id_usuario: "Usuario 2",
                fecha: "2024-04-05",
                cargo: "Tubería",
                descripcion: "Descripción del Operario 2"
            },
            {
                id: 4,
                id_usuario: "Usuario 3",
                fecha: "2024-04-05",
                cargo: "Costura",
                descripcion: "Descripción del Operario 3"
            }
            // Agrega más datos de operarios si es necesario
        ];

        $(document).ready(function() {
            // Cargar las cartas de los operarios al cargar la página
            cargarCartasOperarios();
        });

        function cargarCartasOperarios() {
            const container = $('#cartasOperarios');
            container.empty();

            // Agrupar las cartas por ID de usuario
            const grupos = agruparPorUsuario(cartasOperarios);

            // Iterar sobre cada grupo y mostrar las cartas de cada usuario una detrás de la otra
            grupos.forEach(grupo => {
                const usuarioHtml = `
          <div class="mt-4">
            <h4>${grupo.usuario}</h4>
            ${grupo.cartas.map(carta => `
              <div class="card mb-3">
                <div class="card-header">
                  ${carta.fecha} - ${carta.cargo}
                </div>
                <div class="card-body">
                  <h5 class="card-title">Usuario: ${carta.id_usuario}</h5>
                  <p class="card-text">Fecha: ${carta.fecha}</p>
                  <p class="card-text">Cargo: ${carta.cargo}</p>
                  <p class="card-text">Descripción: ${carta.descripcion}</p>
                  <button class="btn btn-primary btn-sm" onclick="mostrarDetalleCarta(${carta.id})">Ver Detalles</button>
                </div>
              </div>
            `).join('')}
          </div>
        `;
                container.append(usuarioHtml);
            });
        }

        // Función para agrupar las cartas por ID de usuario
        function agruparPorUsuario(cartas) {
            const grupos = {};
            cartas.forEach(carta => {
                if (!grupos[carta.id_usuario]) {
                    grupos[carta.id_usuario] = {
                        usuario: carta.id_usuario,
                        cartas: []
                    };
                }
                grupos[carta.id_usuario].cartas.push(carta);
            });
            return Object.values(grupos);
        }

        function mostrarDetalleCarta(idOperario) {
            const operario = cartasOperarios.find(operario => operario.id === idOperario);
            $('#idUsuario').text(operario.id_usuario);
            $('#fechaOperario').text(operario.fecha);
            $('#cargoOperario').text(operario.cargo);
            $('#descripcionOperario').text(operario.descripcion);
            $('#aprobarCartaBtn').off().click(function() {
                aprobarCarta(idOperario);
                $('#detalleCartaModal').modal('hide');
            });
            $('#rechazarCartaBtn').off().click(function() {
                rechazarCarta(idOperario);
                $('#detalleCartaModal').modal('hide');
            });
            $('#detalleCartaModal').modal('show');
        }

        function aprobarCarta(idOperario) {
            // Aquí pondrías la lógica para aprobar la carta del operario y enviar el comprobante
            alert("La carta del operario " + idOperario + " ha sido aprobada y el comprobante ha sido enviado.");
        }

        function rechazarCarta(idOperario) {
            const mensaje = $('#mensajeRechazo').val();
            // Aquí pondrías la lógica para rechazar la carta del operario y enviar el mensaje de retroalimentación
            alert("La carta del operario " + idOperario + " ha sido rechazada. Mensaje de retroalimentación: " + mensaje);
        }
    </script>
</body>

</html>




<?php
require_once 'C:\xampp\htdocs\Proyecto_gafra\views\solicitudesAdmi\head\footer.php';
?>
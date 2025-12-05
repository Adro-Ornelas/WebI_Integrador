<?php
include "conexion.php";

// ID de la solicitud enviada por GET
$idSolicitud = $_GET['id'];

// Obtener datos completos
$query = $conn->query("
    SELECT 
        s.id,
        s.username,
        s.userphone,
        s.fecha_evento,
        s.punto_inicio,
        s.punto_final,
        s.hora_inicio,
        s.hora_final,
        a.apodo AS nombre_auto
    FROM solicitud_renta s
    INNER JOIN solicitud_renta_auto sra ON s.id = sra.id_solicitud
    INNER JOIN auto a ON a.id = sra.id_auto
    WHERE s.id = $idSolicitud
");

$solicitud = $query->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Solicitud #<?php echo $idSolicitud; ?></title>

    <link href="https://cdn.boxicons.com/fonts/basic/boxicons.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Momo+Trust+Display&family=Momo+Trust+Sans:wght@200..800&family=Ms+Madi&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <!-- Estilos propios -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/carousel.css">
    <link rel="stylesheet" href="css/calendario.css">
</head>

<body>

<?php include 'includes/sidebar.php'; ?>

<main id="main" class="container py-5">


    <div class="card shadow-sm p-4 mt-5">

    <h2 class="text-center mb-4">
        Detalles de Solicitud #<?php echo $idSolicitud; ?>
    </h2>
        <h4 class="mb-3 text-primary">
            Información General
        </h4>

        <div class="row mb-3">
            <div class="col-md-6">
                <p><strong>Nombre del Cliente:</strong> <?php echo $solicitud['username']; ?></p>
            </div>
            <div class="col-md-6">
                <p><strong>Teléfono:</strong> <?php echo $solicitud['userphone']; ?></p>
            </div>
        </div>

        <h4 class="mb-3 text-primary">Detalles del Servicio</h4>

        <div class="row mb-3">
            <div class="col-md-6">
                <p><strong>Auto Solicitado:</strong> <?php echo $solicitud['nombre_auto']; ?></p>
            </div>
            <div class="col-md-6">
                <p>
                    <strong>Fecha del Evento:</strong> 
                    <?php echo $solicitud['fecha_evento']; ?>
                </p>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <p><strong>Hora Inicio:</strong> <?php echo $solicitud['hora_inicio']; ?></p>
            </div>
            <div class="col-md-6">
                <p><strong>Hora Fin:</strong> <?php echo $solicitud['hora_final']; ?></p>
            </div>
        </div>

        <h4 class="mb-3 text-primary">Ubicaciones</h4>

        <p><strong>Punto de Inicio:</strong> <?php echo $solicitud['punto_inicio']; ?></p>
        <p><strong>Punto Final:</strong> <?php echo $solicitud['punto_final']; ?></p>

        <hr>

        <div class="row mt-4">
            <div class="col-md-6">
                <form action="solicitud_resolver.php" method="POST">
                    <input type="hidden" name="id_solicitud" value="<?php echo $idSolicitud; ?>">
                    <button name="accion" value="confirmar" class="btn btn-success w-100 btn-lg">
                        Confirmar Solicitud
                    </button>
                </form>
            </div>

            <div class="col-md-6">
                <form action="solicitud_resolver.php" method="POST">
                    <input type="hidden" name="id_solicitud" value="<?php echo $idSolicitud; ?>">
                    <button name="accion" value="rechazar" class="btn btn-danger w-100 btn-lg">
                        Rechazar Solicitud
                    </button>
                </form>
            </div>
        </div>

    </div>

</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

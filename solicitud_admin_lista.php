<?php

require_once "auth_admin.php";

include "conexion.php";

// Obtener todas las solicitudes
$query = $conn->query("
    SELECT 
        s.id,
        s.username,
        s.fecha_evento,
        s.hora_inicio,
        s.hora_final,
        s.estado
    FROM solicitud_renta s
    ORDER BY s.estado ASC
");

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Solicitudes - Panel Admin</title>
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

<main id="main" class="container py-4">

    <div class="card shadow-sm" style="width: 100dvw; height: 100%;">
        <h2 class="text-center mb-4">Solicitudes Recibidas</h2>
        <div class="card-body">

            <table class="table table-hover align-middle">
                <thead class="table-primary">
                    <tr>
                        <th>ID</th>
                        <th>Cliente</th>
                        <th>Fecha</th>
                        <th>Horario</th>
                        <th>Estado</th>
                        <th class="text-center">Acción</th>
                    </tr>
                </thead>

                <tbody>
                    <?php while ($s = $query->fetch_assoc()): ?>

                        <tr>
                            <td><strong><?php echo $s['id']; ?></strong></td>

                            <td><?php echo htmlspecialchars($s['username']); ?></td>

                            <td><?php echo $s['fecha_evento']; ?></td>

                            <td>
                                <?php echo $s['hora_inicio']; ?> — 
                                <?php echo $s['hora_final']; ?>
                            </td>

                            <td>
                                <?php
                                    $color = "secondary";
                                    if ($s['estado'] === "CONFIRMADA") $color = "success";
                                    if ($s['estado'] === "RECHAZADA") $color = "danger";
                                    if ($s['estado'] === "PENDIENTE") $color = "warning";
                                ?>
                                <span class="badge bg-<?php echo $color; ?>">
                                    <?php echo $s['estado']; ?>
                                </span>
                            </td>

                            <td class="text-center">
                                <a href="solicitud_admin.php?id=<?php echo $s['id']; ?>" 
                                   class="btn btn-sm btn-primary">
                                    Ver más
                                </a>
                            </td>
                        </tr>

                    <?php endwhile; ?>
                </tbody>

            </table>

        </div>
    </div>

</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

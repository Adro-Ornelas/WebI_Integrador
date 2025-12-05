<?php
include "conexion.php";
$idAuto = $_GET['id'];


$infoAuto = $conn->query("SELECT apodo FROM auto WHERE id = $idAuto")->fetch_assoc();
$nombreAuto = $infoAuto['apodo'];

$query = $conn->query("
    SELECT r.fecha_evento
    FROM solicitud_renta_auto sra
    INNER JOIN solicitud_renta r ON sra.id_solicitud = r.id
    WHERE sra.id_auto = $idAuto
");

$fechasOcupadas = [];

while ($row = $query->fetch_assoc()) {
    $fechasOcupadas[] = $row['fecha_evento']; // 'YYYY-MM-DD'
}

$infoPrecio = $conn->query("SELECT valorhora FROM auto WHERE id = $idAuto")->fetch_assoc();
$valorHora = $infoPrecio['valorhora'];

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AoRent</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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



    <!-- Bootstrap local para desarrollo offline BORRAR AL FINAL -->
    <!-- <link rel="stylesheet" href="/home/usuario1/Documents/WebI/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <script src="/home/usuario1/Documents/WebI/bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
    <script src="/home/usuario1/Documents/WebI/bootstrap-5.0.2-dist/js/bootstrap.bundle.js"></script> -->

    <!-- Estilos propios -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/carousel.css">
    <link rel="stylesheet" href="css/calendario.css">

    <script>
        const fechasOcupadas = <?php echo json_encode($fechasOcupadas); ?>;
    </script>
    <script>
        const valorHora = <?php echo $valorHora; ?>;
    </script>

</head>

<body>
    <?php
    include 'includes/sidebar.php';
    ?>
    <main id="main" class="row">
        <div class="container-fluid px-5">

            <h2 class="text-center mb-4">Reservar <?php echo $nombreAuto; ?></h2>

            <div class="row align-items-start pt-3 mt-5 mb-5 px-4">
                <!-- CALENDARIO -->
                <div class="col">
                    <h4 class="text-center">Selecciona un día</h4>
                    <div id="calendar" class="calendar">
                        <div class="header">
                            <button id="prevBtn">
                                <i class='bxr  bx-caret-left'></i>
                            </button>
                            <div class="monthYear" id="monthYear"></div>
                            <button id="nextBtn">
                                <i class='bxr  bx-caret-right'></i>
                            </button>
                        </div>
                        <div class="days">
                            <div class="day">Lu.</div>
                            <div class="day">Ma.</div>
                            <div class="day">Mi.</div>
                            <div class="day">Ju.</div>
                            <div class="day">Vi.</div>
                            <div class="day">Sa.</div>
                            <div class="day">Do.</div>
                        </div>
                        <div class="dates" id="dates"></div>

                    </div>

                    <p class="mt-3" style="font-size: 18px; color: #7158ff;"><strong>Fecha seleccionada: </strong><span
                            id="fechaSeleccionada" style="color: black;"></span></p>
                </div>

                <!-- FORMULARIO -->
                <div class="col">

                    <form action="reservar_guardar.php" method="POST">

                        <input type="hidden" name="id_auto" value="<?php echo $idAuto; ?>">
                        <input type="hidden" name="fecha" id="inputFecha">

                        <!-- UBICACION INICIO -->
                        <label class="form-label fw-bold">Punto de Inicio</label>
                        <div class="input-group mb-3">
                            <input type="text" id="ubicInicio" name="ubic_inicio" class="form-control"
                                required>
                            <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                data-bs-target="#modalMapa" onclick="modoUbicacion='inicio'">
                                Seleccionar
                            </button>
                        </div>

                        <!-- UBICACION FINAL -->
                        <label class="form-label fw-bold">Punto Final</label>
                        <div class="input-group mb-3">
                            <input type="text" id="ubicFinal" name="ubic_final" class="form-control" required>
                            <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                data-bs-target="#modalMapa" onclick="modoUbicacion='final'">
                                Seleccionar
                            </button>
                        </div>

                        <!-- HORAS -->
                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label">Hora Inicio</label>
                                <input type="time" name="hora_inicio" class="form-control" required>
                            </div>
                            <div class="col">
                                <label class="form-label">Hora Fin</label>
                                <input type="time" name="hora_fin" class="form-control" required>
                            </div>
                        </div>

                        <!-- BOTON -->
                        <button class="btn btn-primary w-100 mt-3">Enviar Reserva</button>

                    </form>
                    <div class="mt-3">
                        <label class="form-label fw-bold">Costo Total (MXN):</label>
                        <input type="text" id="totalPagar" class="form-control" readonly>
                    </div>
                </div>

            </div>
        </div>


        <!-- MAPA -->
        <div class="modal fade" id="modalMapa">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5>Seleccionar ubicación</h5>
                        <button class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <input id="buscarDireccion" class="form-control mb-2" placeholder="Buscar dirección">

                        <div id="map" style="height: 400px;"></div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-success" data-bs-dismiss="modal" onclick="guardarUbicacion()">Usar
                            ubicación</button>
                    </div>

                </div>
            </div>
        </div>


    </main>
    <script src="js/solicitud.js"></script>
    <script src="js/sidebar.js" async defer></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
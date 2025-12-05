<?php
include "conexion.php";
$id_auto      = $_POST['id_auto'];
$fecha        = $_POST['fecha'];
$hora_inicio  = $_POST['hora_inicio'];
$hora_fin     = $_POST['hora_fin'];
$ubic_inicio  = $_POST['ubic_inicio'];
$ubic_final   = $_POST['ubic_final'];

if (!$id_auto || !$fecha || !$hora_inicio || !$hora_fin || !$ubic_inicio || !$ubic_final) {
    die("Error: Faltan campos.");
}

$stmt = $conn->prepare("
    INSERT INTO solicitud_renta (fecha_evento, hora_inicio, hora_final, punto_inicio, punto_final)
    VALUES (?, ?, ?, ?, ?)
");
$stmt->bind_param("sssss", $fecha, $hora_inicio, $hora_fin, $ubic_inicio, $ubic_final);

if (!$stmt->execute()) {
    die("Error al guardar solicitud: " . $stmt->error);
}

$id_solicitud = $stmt->insert_id;

$stmt->close();

$stmt2 = $conn->prepare("
    INSERT INTO solicitud_renta_auto (id_solicitud, id_auto)
    VALUES (?, ?)
");
$stmt2->bind_param("ii", $id_solicitud, $id_auto);

if (!$stmt2->execute()) {
    die("Error al relacionar auto: " . $stmt2->error);
}

$stmt2->close();

echo "
<script>
alert('La reserva fue creada correctamente.');
window.location.href = 'index.php#catalogo';
</script>
";
?>
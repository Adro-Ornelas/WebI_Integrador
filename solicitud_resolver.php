<?php
include "conexion.php";

$id = $_POST['id_solicitud'];
$accion = $_POST['accion'];

if ($accion === "confirmar") {
    $conn->query("UPDATE solicitud_renta SET estado='CONFIRMADA' WHERE id=$id");
}

if ($accion === "rechazar") {
    $conn->query("UPDATE solicitud_renta SET estado='RECHAZADA' WHERE id=$id");
}

header("Location: solicitud_admin_lista.php?msg=ok");
exit;
?>
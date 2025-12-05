<?php
require_once "conexion.php";

if (!empty($_POST["titulo_nuevo"]) && !empty($_POST["contenido_nuevo"])) {

    $titulo = trim($_POST["titulo_nuevo"]);
    $contenido = trim($_POST["contenido_nuevo"]);

    $stmt = $conn->prepare("INSERT INTO faq (titulo, contenido) VALUES (?, ?)");
    $stmt->bind_param("ss", $titulo, $contenido);
    $stmt->execute();
    $stmt->close();
}

$conn->close();

header("Location: faq_admin.php?added=1");
exit;
?>
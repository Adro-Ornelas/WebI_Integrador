<?php
require_once "conexion.php";

if (!empty($_POST["titulo"]) && !empty($_POST["contenido"])) {
    foreach ($_POST["titulo"] as $id => $titulo) {

        $titulo = trim($titulo);
        $contenido = trim($_POST["contenido"][$id]);

        $stmt = $conn->prepare("UPDATE faq SET titulo = ?, contenido = ? WHERE id = ?");
        $stmt->bind_param("ssi", $titulo, $contenido, $id);
        $stmt->execute();
        $stmt->close();
    }
}

$conn->close();

// Redirige de vuelta al panel
header("Location: faq_admin.php?ok=1");
exit;
?>

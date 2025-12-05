<?php
require_once "conexion.php";

if (isset($_GET["id"])) {
    $id = intval($_GET["id"]);

    $stmt = $conn->prepare("DELETE FROM faq WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}

$conn->close();

header("Location: faq_admin.php?deleted=1");
exit;
?>
